# HelloBees — CQRS architecture & resume snapshot

> Handoff document to resume this work later (with Claude Code, Codex, or any
> assistant). Last updated: 2026-09-14.

## 1. What this project is

HelloBees is a personal PHP 8.4 Domain-Driven Design project (beekeeping domain).

- PSR-4: `HelloBees\` → `www/src/`, `HelloBeesTest\` → `www/tests/`.
- No web framework wired yet (domain-first). Tooling: Composer, PHPUnit, PHPStan,
  PHP_CodeSniffer (see `www/composer.json`, `www/phpunit.xml`).
- Personal beta repo (`Drago37/hellobees`): work is pushed straight to `main`,
  no PR, no release. Commit messages carry **no** attribution / Co-Authored-By lines.

## 2. Architecture: centreon `src/App`-style CQRS

The architecture is modelled on **centreon/centreon `src/App`** (API-Platform era),
NOT `src/Core`. We keep the *essence* and drop the framework overhead:

- **Kept:** typed Command/Query DTOs, one Handler per use case that **returns** its
  result, read-model DTOs for reads, per-aggregate domain exceptions, fail-fast
  Value Objects.
- **Dropped (deliberately):** API Platform, Symfony Messenger / command bus,
  presenters, the old `UseCaseResponse`/`ResponseError` mechanism. Handlers are
  called directly.

### Folder layout per bounded context

```
www/src/<Context>/
  Application/
    Command/<UseCase>/  <Name>Command.php   (final readonly DTO of Value Objects)
                        <Name>Handler.php    (final readonly, __invoke(Command): Aggregate|void)
    Query/<UseCase>/    <Name>Query.php      (final readonly DTO; filters as VOs)
                        <Name>Handler.php    (__invoke(Query): <Entity>View | list<View>)
                        <Entity>View.php     (final readonly read-model + static fromEntity())
  Domain/
    Entity/ Aggregate/ Collection/ Enum/ ValueObject/
    Repository/         <Aggregate>Repository.php  (interface, one per aggregate)
    Exception/          <Aggregate>NotFoundException.php
  Infrastructure/       (repository implementations — not built yet)
```

### Rules

- Every file: `declare(strict_types=1);`. DTOs / Value Objects are `final readonly class`.
- **Writes** (`Command`): build a new aggregate (`Uuid::generate()` + `DateTime::now()`
  inside the handler) or load-mutate-persist; return the aggregate. Deletes return `void`.
- **Reads** (`Query`): return a `<Entity>View` read-model (primitives), or a
  `list<<Entity>View>`. Read-all use cases are named `List<Plural>` (e.g. `ListBeekeepers`),
  singular lookups stay `Show<Entity>`.
- **Errors:** a load that can miss throws a per-aggregate `<Aggregate>NotFoundException`
  (`final class` extending `HelloBees\SharedKernel\Domain\Exception\DomainException`,
  `CODE_NOT_FOUND_ERROR`, static `withUuid(Uuid): self`). The caller catches it.
- **Repositories:** a single interface per aggregate in `Domain/Repository/`
  (no Read/Write split — that is centreon `Core`, not `App`).
- **Docblocks:** only `@throws`, `@phpstan-*`, and useful generics
  (`array<T>`, `list<T>`, `class-string<T>`) are kept. No `@param`/`@return`/`@class`/`@package`.
- **Tests:** one handler test per handler (happy path + not-found where relevant),
  driven by in-memory repository doubles placed in a `Double/` folder under
  `www/tests/<Context>/`. Use PHPUnit attributes (`#[DataProvider]`), never doc-comment
  metadata.

### Canonical reference

**`www/src/BeeKeeping/`** is the reference implementation — copy its shape for any new
use case or context. It has the full CRUD: `Command/{AddBeekeeper,UpdateBeekeeper,
DeleteBeekeeper}`, `Query/{ShowBeekeeper,ListBeekeepers}`, `Domain/Exception/
BeekeeperNotFoundException`, and matching tests under `www/tests/BeeKeeping/` incl.
`Double/InMemoryBeekeeperRepository`.

## 3. Current state (done)

All bounded contexts migrated to the CQRS style above:

| Context     | Use cases                                                        |
|-------------|------------------------------------------------------------------|
| BeeKeeping  | Add/Update/Delete beekeeper, ShowBeekeeper, ListBeekeepers        |
| Sales       | 15 use cases across Command / Customer / Product aggregates       |
| History     | AddTraceComment, ShowTrace, ListTraces                            |
| Production  | Add/Update harvest, ShowHarvest, ListHarvests, ListHarvestsByApiary |
| Accounts    | Domain only — no use cases yet                                    |

Test suite: **181 tests, 260 assertions, 0 failures, 0 deprecations** (the only
warning is "No code coverage driver available" — xdebug/pcov not installed).

Also done this session: repaired a blocking `NapiNumber` validation bug; retired the
dead `SharedKernel/Domain/UseCase` response classes; a large PHPDoc cleanup; a
context-first directory restructure (`Domain/<Context>` → `<Context>/Domain`).

## 4. Next steps / open items

- **Infrastructure layer:** no repository implementations exist yet — every context
  has `Domain/Repository/<Aggregate>Repository` interfaces but no concrete adapter
  (PDO/DBAL). Needed to actually run anything beyond unit tests.
- **HTTP layer:** none. A thin controller/action that builds a Command/Query from the
  request, calls the handler, and JSON-encodes the result (or maps a domain exception
  to an HTTP status) would complete a vertical slice.
- **Accounts context:** has domain classes (Credit, Expense, Resource) but no use cases.
- **BeeKeeping other aggregates:** only the Beekeeper aggregate has use cases; Apiary,
  Beehive, Feeding, Task, Visit do not yet.
- **Cross-context coupling to review:** Production handlers resolve an `Apiary`
  (a BeeKeeping aggregate) by `Uuid`, so Production depends on BeeKeeping's
  `ApiaryRepository` + `ApiaryNotFoundException`. Pre-existing; revisit if strict
  context isolation is wanted.

## 5. Useful commands (run from `www/`)

```bash
composer dump-autoload -o --strict-psr   # regenerate autoloader, check PSR-4
vendor/bin/phpunit                        # full test suite
vendor/bin/phpunit tests/BeeKeeping       # one context
php -l <file>                             # syntax check
```
