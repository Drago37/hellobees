<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\AddTraceComment;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\DateTime;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;
use HelloBees\Domain\Trace\Entity\Trace;
use HelloBees\Domain\Trace\Enum\TraceAction;
use HelloBees\Domain\Trace\Enum\TraceOperation;
use HelloBees\Domain\Trace\Repository\TraceRepository;

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
     * @param TraceRepository $traceRepository
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