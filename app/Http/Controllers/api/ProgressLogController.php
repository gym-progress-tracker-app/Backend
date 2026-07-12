<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgressLogRequest;
use App\Models\ProgressLog;
use App\Services\ProgressLogService;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Gate;

class ProgressLogController extends Controller
{
    use ResponseTrait;

    public function createProgressLog(ProgressLogRequest $request, ProgressLogService $progressLogService)
    {
        Gate::authorize('create', ProgressLog::class);

        $progressLog = $progressLogService->createProgressLog($request->validated(), $request->user());

        return $this->success($progressLog, 'Progress log created successfully', 201);
    }

    public function getProgressLogs(ProgressLogService $progressLogService)
    {
        $progressLogs = $progressLogService->getProgressLogs(auth()->user());

        return $this->success($progressLogs, 'Progress logs fetched successfully');
    }

    public function getProgressLogByExerciseId($exerciseid, ProgressLogService $progressLogService)
    {
        $progressLogs = $progressLogService->getProgressLogByExerciseId(auth()->user(), $exerciseid);

        return $this->success($progressLogs, 'Progress logs fetched successfully');
    }

    public function deleteProgressLog($progressLogId, ProgressLogService $progressLogService)
    {
        

        $progressLogService->deleteProgressLog($progressLogId, auth()->user());

        return $this->success(null, 'Progress log deleted successfully');
    }
}
