<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Folder\CreateFolderRequest;
use App\Http\Requests\Api\v1\Folder\UpdateFolderRequest;
use App\Http\Resources\FolderResource;
use App\Models\Folder;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FolderController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        /** @var User $user */
        $user = auth()->user();

        return FolderResource::collection($user->folders);
    }

    /**
     * @param CreateFolderRequest $request
     * @return FolderResource
     */
    public function store(CreateFolderRequest $request): FolderResource
    {
        /** @var User $user */
        $user = auth()->user();

        $user->folders()->create($request->validated());

        return new FolderResource($user->folders()->latest()->first());
    }

    /**
     * @param Folder $folder
     * @return FolderResource
     * @throws AuthorizationException
     */
    public function show(Folder $folder): FolderResource
    {
        $this->authorize('has', $folder);

        return new FolderResource($folder);
    }

    /**
     * @param UpdateFolderRequest $request
     * @param Folder $folder
     * @return FolderResource
     * @throws AuthorizationException
     */
    public function update(UpdateFolderRequest $request, Folder $folder): FolderResource
    {
        $this->authorize('update', $folder);

        $folder->update($request->validated());

        return new FolderResource($folder);
    }

    /**
     * @param Folder $folder
     * @return FolderResource
     * @throws AuthorizationException
     */
    public function destroy(Folder $folder): FolderResource
    {
        $this->authorize('delete', $folder);

        $folder->delete();

        return new FolderResource($folder);
    }
}
