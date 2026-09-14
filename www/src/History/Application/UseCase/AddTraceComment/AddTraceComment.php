<?php

declare(strict_types=1);

namespace HelloBees\History\Application\UseCase\AddTraceComment;

use HelloBees\History\Domain\Entity\Trace;
use HelloBees\History\Domain\Enum\TraceAction;
use HelloBees\History\Domain\Enum\TraceOperation;
use HelloBees\History\Domain\Repository\TraceRepository;
use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

/**
 * Class
 *
 * @class AddTraceComment
 * @package HelloBees\Domain\Trace\UseCase\AddTraceComment
 */
final readonly class AddTraceComment
{
    /**
     * AddTraceComment constructor
     *
     * @param \HelloBees\History\Domain\Repository\TraceRepository $traceRepository
     */
    public function __construct(
        private TraceRepository $traceRepository
    )
    {
    }

    /**
     * @param AddTraceCommentRequest $request
     * @param AddTraceCommentPresenter $presenter
     * @return void
     */
    public function execute(AddTraceCommentRequest $request, AddTraceCommentPresenter $presenter): void
    {
        $response = new AddTraceCommentResponse();
        if ($this->validate($request)) {
            try {
                $trace = new Trace(
                    Uuid::generate(),
                    DateTime::now(),
                    TraceOperation::Create,
                    TraceAction::TraceComment,
                    $request->getComment(),
                    $request->getBeeKeeperId(),
                    $request->getBeehiveId(),
                    $request->getApiaryId(),
                );
                $this->traceRepository->insert($trace);
            } catch (RepositoryException|InvalidValueObjectException $e) {
                $response->setError(new ResponseError('trace.add.comment.failed', ['request' => $request], $e));
            }
        } else {
            if (empty($request->getComment())) {
                $response->setError(new ResponseError('trace.add.comment.empty'));
            } elseif (empty($request->getBeeKeeperId())) {
                $response->setError(new ResponseError('trace.add.beekeeper_id.empty'));
            }
        }
        $presenter->present($response);
    }

    /**
     * @param AddTraceCommentRequest $request
     * @return bool
     */
    private function validate(AddTraceCommentRequest $request): bool
    {
        return !empty($request->getComment());
    }
}