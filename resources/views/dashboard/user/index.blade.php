@extends('dashboard.app')

@section('content')
<section class="grid grid-cols-2 auto-cols-[1fr] gap-6">
    <div class="grid grid-flow-row auto-rows-auto gap-6">
        <div>
            <div class="bg-white border rounded p-4 space-y-2">
                <div>
                    <label for="full-name" class="dash-label">Full Name</label>
                    <input type="text" name="full-name" id="full-name" value="Ghazwul Shaf" readonly>
                </div>
                <div>
                    <label for="username" class="dash-label">Username</label>
                    <input type="text" name="username" id="username" value="ghazwulshaf" readonly>
                </div>
            </div>
        </div>
        <div class="space-y-2">
            <div class="flex items-center gap-2">
                <span>Account</span>
                <div class="dash-line"></div>
            </div>
            @foreach ($accounts as $account)
            <div class="flex items-start gap-3 bg-white border rounded p-4">
                <div>
                    <div id="account-{{ $account['id'] }}-image" class="text-xl">{!! $account['icon'] !!}</div>
                </div>
                <div class="w-full">
                    <form id="account-{{ $account['id'] }}-delete-form" action="{{ route('accounts.destroy', $account['id']) }}" method="POST" class="hidden">
                        @method('DELETE')
                        @csrf
                    </form>
                    <form id="account-{{ $account['id'] }}-edit-form" action="{{ route('accounts.update', $account['id']) }}" method="POST" class="space-y-2 *:space-y-1">
                        @method('PUT')
                        @csrf
                        <div>
                            <label for="account-{{ $account['id'] }}-name" class="dash-label">Account Name</label>
                            <input type="text" name="account-{{ $account['id'] }}-name" id="account-{{ $account['id'] }}-name" class="dash-input" value="{{ $account['name'] }}" required readonly>
                        </div>
                        <div>
                            <label for="account-{{ $account['id'] }}-link" class="dash-label">Account Link</label>
                            <input type="text" name="account-{{ $account['id'] }}-link" id="account-{{ $account['id'] }}-link" class="dash-input" value="{{ $account['link'] }}" required readonly>
                        </div>
                        <div>
                            <label for="account-{{ $account['id'] }}-icon" class="dash-label">Account Icon</label>
                            <input type="text" name="account-{{ $account['id'] }}-icon" id="account-{{ $account['id'] }}-icon" class="dash-input" value="{{ $account['icon'] }}" onchange="changeImage('account-{{ $account['id'] }}')" required readonly>
    
                            <p class="!mt-0 text-xs text-gray-500">Please, get the icon from <a href="https://fontawesome.com/" target="blank" class="font-semibold text-primary-500">FontAwesome</a> with html tag</p>
                        </div>
                    </form>
                    <div id="account-{{ $account['id'] }}-index-button" class="flex justify-end !mt-4 space-x-2 *:dash-button">
                        <button onclick="openEditAccount('account-{{ $account['id'] }}')" class="bg-orange-500 text-white"><i class="fa-solid fa-pen"></i>Edit</button>
                        <button type="submit" form="account-{{ $account['id'] }}-delete-form" class="bg-red-500 text-white"><i class="fa-solid fa-trash"></i>Delete</button>
                    </div>
                    <div id="account-{{ $account['id'] }}-edit-button" class="hidden justify-end !mt-4 space-x-2 *:dash-button">
                        <button onclick="closeEditAccount('account-{{ $account['id'] }}')" class="bg-gray-100"><i class="fa-solid fa-xmark"></i>Cancel</button>
                        <button type="submit" form="account-{{ $account['id'] }}-edit-form" class="bg-green-500 text-white"><i class="fa-solid fa-floppy-disk"></i>Save</button>
                    </div>
                </div>
            </div>
            @endforeach
            <div id="btn-add-account" class="flex justify-end text-sm !mt-4">
                <button onclick="showFormAddAccount()"><i class="fa-regular fa-square-plus"></i>Add Account</button>
            </div>
            <div id="form-add-account" class="hidden items-start gap-3 bg-white border rounded p-4">
                <div>
                    <div id="account-new-image" class="text-xl"></div>
                </div>
                <div class="w-full">
                    <form id="account-new" action="{{ route('accounts.store') }}" method="POST" class="space-y-2 *:space-y-1">
                        @csrf
                        <div>
                            <label for="account-new-name" class="dash-label">Account Name</label>
                            <input type="text" name="account-new-name" id="account-new-name" class="dash-input" required>
                        </div>
                        <div>
                            <label for="account-new-link" class="dash-label">Account Link</label>
                            <input type="text" name="account-new-link" id="account-new-link" class="dash-input" required>
                        </div>
                        <div>
                            <label for="account-new-icon" class="dash-label">Account Icon</label>
                            <input type="text" name="account-new-icon" id="account-new-icon" class="dash-input" onchange="changeImage('account-new')" required>
    
                            <p class="!mt-0 text-xs text-gray-500">Please, get the icon from <a href="https://fontawesome.com/" target="blank" class="font-semibold text-primary-500">FontAwesome</a> with html tag</p>
                        </div>
                    </form>
                    <div class="flex justify-end !mt-4 space-x-2 *:dash-button">
                        <button onclick="hideFormAddAccount()" class="bg-gray-100"><i class="fa-solid fa-xmark"></i>Cancel</button>
                        <button type="submit" form="account-new" class="bg-blue-500 text-white"><i class="fa-solid fa-plus"></i>Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-2">
        <div class="flex items-center gap-2">
            <span>Category</span>
            <div class="dash-line"></div>
        </div>
        <div class="bg-white border rounded p-4">
            Ini adalah user
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function changeImage(nodeId) {
        const nodeInput = document.getElementById(nodeId + '-icon')
        const nodeImage = document.getElementById(nodeId + '-image')
        nodeImage.innerHTML = nodeInput.value
    }

    const btnAddAccount = document.getElementById('btn-add-account')
    const formAddAccount = document.getElementById('form-add-account')

    function showFormAddAccount() {
        btnAddAccount.classList.replace('flex', 'hidden')
        formAddAccount.classList.replace('hidden', 'flex')
    }

    function hideFormAddAccount() {
        btnAddAccount.classList.replace('hidden', 'flex')
        formAddAccount.classList.replace('flex', 'hidden')
    }

    function openEditAccount(nodeId) {
        const groupIndexButton = document.getElementById(nodeId + '-index-button')
        const groupEditButton = document.getElementById(nodeId + '-edit-button')

        groupIndexButton.classList.replace('flex', 'hidden')
        groupEditButton.classList.replace('hidden', 'flex')

        const nodeInputName = document.getElementById(nodeId + '-name')
        const nodeInputLink = document.getElementById(nodeId + '-link')
        const nodeInputIcon = document.getElementById(nodeId + '-icon')

        nodeInputName.readOnly = false
        nodeInputLink.readOnly = false
        nodeInputIcon.readOnly = false
    }

    function closeEditAccount(nodeId) {
        const groupIndexButton = document.getElementById(nodeId + '-index-button')
        const groupEditButton = document.getElementById(nodeId + '-edit-button')

        groupIndexButton.classList.replace('hidden', 'flex')
        groupEditButton.classList.replace('flex', 'hidden')

        const nodeInputName = document.getElementById(nodeId + '-name')
        const nodeInputLink = document.getElementById(nodeId + '-link')
        const nodeInputIcon = document.getElementById(nodeId + '-icon')

        nodeInputName.readOnly = true
        nodeInputLink.readOnly = true
        nodeInputIcon.readOnly = true
    }
</script>
@endpush