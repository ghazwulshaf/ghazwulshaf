@extends('dashboard.app')

@section('content')
<section class="grid grid-cols-2 auto-cols-[1fr] gap-6">
    <div class="grid grid-flow-row auto-rows-auto gap-6">
        <div>
            <div class="bg-white border rounded p-4 space-y-2">
                <div>
                    <label for="full-name" class="dash-label">Full Name</label>
                    <input type="text" name="full-name" id="full-name" value="Ghazwul Shaf" class="dash-input" readonly>
                </div>
                <div>
                    <label for="username" class="dash-label">Username</label>
                    <input type="text" name="username" id="username" value="ghazwulshaf" class="dash-input" readonly>
                </div>
            </div>
        </div>

        {{-- Account Region --}}
        <div class="space-y-2">
            <div class="flex items-center gap-2">
                <span>Account</span>
                <div class="dash-line"></div>
            </div>

            {{-- Account Data --}}
            @foreach ($accounts as $account)
            <div class="flex items-start gap-3 bg-white border rounded p-4">
                <div>
                    <div id="account-{{ $account['id'] }}-image" class="text-2xl">{!! $account['icon'] !!}</div>
                </div>
                <div class="w-full">
                    {{-- Form for delete data :hidden --}}
                    <form id="account-{{ $account['id'] }}-delete-form" action="{{ route('accounts.destroy', $account['id']) }}" method="POST" class="hidden">
                        @method('DELETE')
                        @csrf
                    </form>
                    {{-- Form for edit data --}}
                    <form id="account-{{ $account['id'] }}-edit-form" action="{{ route('accounts.update', $account['id']) }}" method="POST" class="space-y-2 *:space-y-1">
                        @method('PUT')
                        @csrf
                        <div>
                            <label for="account-{{ $account['id'] }}-name" class="dash-label">Account's Name</label>
                            <input type="text" name="account-{{ $account['id'] }}-name" id="account-{{ $account['id'] }}-name" class="dash-input" placeholder="Your account's name" value="{{ $account['name'] }}" required readonly>
                        </div>
                        <div>
                            <label for="account-{{ $account['id'] }}-link" class="dash-label">Account's Link</label>
                            <input type="text" name="account-{{ $account['id'] }}-link" id="account-{{ $account['id'] }}-link" class="dash-input" placeholder="Your account's link" value="{{ $account['link'] }}" required readonly>
                        </div>
                        <div>
                            <label for="account-{{ $account['id'] }}-icon" class="dash-label">Account's Icon</label>
                            <input type="text" name="account-{{ $account['id'] }}-icon" id="account-{{ $account['id'] }}-icon" class="dash-input" placeholder="Your account's icon" value="{{ $account['icon'] }}" onchange="changeAccountImage('account-{{ $account['id'] }}')" required readonly>
    
                            <p class="!mt-0 text-xs text-gray-500">Please, get the icon from <a href="https://fontawesome.com/" target="blank" class="font-semibold text-primary-500">FontAwesome</a> with html tag</p>
                        </div>
                    </form>
                    {{-- button group for index data --}}
                    <div id="account-{{ $account['id'] }}-index-button" class="flex justify-end !mt-4 space-x-2 *:dash-button">
                        <button onclick="openEditAccount('account-{{ $account['id'] }}', true)" class="bg-orange-500 text-white"><i class="fa-solid fa-pen"></i>Edit</button>
                        <button type="submit" form="account-{{ $account['id'] }}-delete-form" class="bg-red-500 text-white"><i class="fa-solid fa-trash"></i>Delete</button>
                    </div>
                    {{-- button group for edit data :init hidden --}}
                    <div id="account-{{ $account['id'] }}-edit-button" class="hidden justify-end !mt-4 space-x-2 *:dash-button">
                        <button onclick="openEditAccount('account-{{ $account['id'] }}', false)" class="bg-gray-100"><i class="fa-solid fa-xmark"></i>Cancel</button>
                        <button type="submit" form="account-{{ $account['id'] }}-edit-form" class="bg-green-500 text-white"><i class="fa-solid fa-floppy-disk"></i>Save</button>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- Button Add Account --}}
            <div id="btn-add-account" class="flex justify-end text-sm !mt-4">
                <button onclick="showFormAddAccount()" class="btn"><i class="fa-regular fa-square-plus"></i>Add Account</button>
            </div>

            {{-- Form Add Account --}}
            <div id="form-add-account" class="hidden items-start gap-3 bg-white border rounded p-4">
                <div>
                    <div id="account-new-image" class="text-2xl"></div>
                </div>
                <div class="w-full">
                    <form id="account-new" action="{{ route('accounts.store') }}" method="POST" class="space-y-2 *:space-y-1">
                        @csrf
                        <div>
                            <label for="account-new-name" class="dash-label">Account's Name</label>
                            <input type="text" name="account-new-name" id="account-new-name" class="dash-input" placeholder="Your account's name" required>
                        </div>
                        <div>
                            <label for="account-new-link" class="dash-label">Account's Link</label>
                            <input type="text" name="account-new-link" id="account-new-link" class="dash-input" placeholder="Your account's link" required>
                        </div>
                        <div>
                            <label for="account-new-icon" class="dash-label">Account's Icon</label>
                            <input type="text" name="account-new-icon" id="account-new-icon" class="dash-input" placeholder="Your account's icon" onchange="changeAccountImage('account-new')" required>
    
                            <p class="!mt-0 text-xs text-gray-500">Please, get the icon from <a href="https://fontawesome.com/" target="blank" class="font-semibold text-primary-500">FontAwesome</a> with html tag</p>
                        </div>
                    </form>
                    {{-- button group for add data --}}
                    <div class="flex justify-end !mt-4 space-x-2 *:dash-button">
                        <button onclick="hideFormAddAccount()" class="bg-gray-100"><i class="fa-solid fa-xmark"></i>Cancel</button>
                        <button type="submit" form="account-new" class="bg-blue-500 text-white"><i class="fa-solid fa-plus"></i>Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Category Region --}}
    <div class="space-y-2">
        <div class="flex items-center gap-2">
            <span>Category</span>
            <div class="dash-line"></div>
        </div>

        {{-- Category Data --}}
        @foreach ($categories as $category)
        <div class="flex gap-3 bg-white border rounded p-4">
            <div class="block w-1/6">
                <img id="category-{{ $category['id'] }}-image" src="{{ asset('storage/'.$category['path']) }}" alt="Website" class="contain">
            </div>
            <div class="w-full">
                {{-- Form for delete data :hidden --}}
                <form id="category-{{ $category['id'] }}-delete-form" action="{{ route('categories.destroy', $category['id']) }}" method="POST" class="hidden">
                    @method('DELETE')
                    @csrf
                </form>
                {{-- Form for edit data --}}
                <form id="category-{{ $category['id'] }}-edit-form" action="{{ route('categories.update', $category['id']) }}" method="POST" enctype="multipart/form-data" class="space-y-2 *:space-y-1">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="category-{{ $category['id'] }}-image-old" value="{{ $category['path'] }}">
                    <div>
                        <label for="category-{{ $category['id'] }}-name" class="dash-label">Category's Name</label>
                        <input type="text" name="category-{{ $category['id'] }}-name" id="category-{{ $category['id'] }}-name" class="dash-input" placeholder="Your category's name" value="{{ $category['name'] }}" required readonly>
                    </div>
                    <div id="category-{{ $category['id'] }}-file-input" class="hidden">
                        <label for="category-{{ $category['id'] }}-file" class="dash-label">Category's Image File</label>
                        <input type="file" name="category-{{ $category['id'] }}-file" id="category-{{ $category['id'] }}-file" class="dash-input text-sm" value="{{ asset('storage/'.$category['path']) }}" onchange="changeCategoryImage('category-{{ $category['id'] }}')" disabled>

                        <p class="!mt-0 text-xs text-gray-500">Please, get the image from <a href="https://www.flaticon.com/" target="blank" class="font-semibold text-primary-500">Flaticon</a> with png file</p>
                    </div>
                </form>
                {{-- button group for index data --}}
                <div id="category-{{ $category['id'] }}-index-button" class="flex justify-end !mt-4 space-x-2 *:dash-button">
                    <button onclick="openEditCategory('category-{{ $category['id'] }}', true)" class="bg-orange-500 text-white"><i class="fa-solid fa-pen"></i>Edit</button>
                    <button type="submit" form="category-{{ $category['id'] }}-delete-form" class="bg-red-500 text-white"><i class="fa-solid fa-trash"></i>Delete</button>
                </div>
                {{-- button group for edit data :init hidden --}}
                <div id="category-{{ $category['id'] }}-edit-button" class="hidden justify-end !mt-4 space-x-2 *:dash-button">
                    <button onclick="openEditCategory('category-{{ $category['id'] }}', false)"  class="bg-gray-100"><i class="fa-solid fa-xmark"></i>Cancel</button>
                    <button type="submit" form="category-{{ $category['id'] }}-edit-form" class="bg-green-500 text-white"><i class="fa-solid fa-floppy-disk"></i>Save</button>
                </div>
            </div>
        </div>
        @endforeach

        {{-- Button Add Category --}}
        <div id="btn-add-category" class="flex justify-end text-sm !mt-4">
            <button onclick="showFormAddCategory()" class="btn"><i class="fa-regular fa-square-plus"></i>Add Category</button>
        </div>

        {{-- Form Add Category --}}
        <div id="form-add-category" class="hidden gap-3 bg-white border rounded p-4">
            <div class="block w-1/6">
                <img id="category-new-image" src="" alt="" class="contain">
            </div>
            <div class="w-full">
                <form id="category-new" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-2 *:space-y-1">
                    @csrf
                    <div>
                        <label for="category-new-name" class="dash-label">Category's Name</label>
                        <input type="text" name="category-new-name" id="category-new-name" class="dash-input" placeholder="Your category's name" required>
                    </div>
                    <div>
                        <label for="category-new-file" class="dash-label">Category's Image File</label>
                        <input type="file" name="category-new-file" id="category-new-file" class="dash-input text-sm" onchange="changeCategoryImage('category-new')" required>

                        <p class="!mt-0 text-xs text-gray-500">Please, get the image from <a href="https://www.flaticon.com/" target="blank" class="font-semibold text-primary-500">Flaticon</a> with png file</p>
                    </div>
                </form>
                {{-- button group for add data --}}
                <div class="flex justify-end !mt-4 space-x-2 *:dash-button">
                    <button onclick="hideFormAddCategory()" class="bg-gray-100"><i class="fa-solid fa-xmark"></i>Cancel</button>
                    <button type="submit" form="category-new" class="bg-blue-500 text-white"><i class="fa-solid fa-plus"></i>Create</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Account Region

    function changeAccountImage(nodeId) {
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

    function openEditAccount (nodeId, option) {
        const groupIndexButton = document.getElementById(nodeId + '-index-button')
        const groupEditButton = document.getElementById(nodeId + '-edit-button')

        const nodeInputName = document.getElementById(nodeId + '-name')
        const nodeInputLink = document.getElementById(nodeId + '-link')
        const nodeInputIcon = document.getElementById(nodeId + '-icon')

        if (option) {
            groupIndexButton.classList.replace('flex', 'hidden')
            groupEditButton.classList.replace('hidden', 'flex')

            nodeInputName.readOnly = false
            nodeInputLink.readOnly = false
            nodeInputIcon.readOnly = false
        } else {
            groupIndexButton.classList.replace('hidden', 'flex')
            groupEditButton.classList.replace('flex', 'hidden')

            nodeInputName.readOnly = true
            nodeInputLink.readOnly = true
            nodeInputIcon.readOnly = true

            location.reload()
        }
    }
</script>

<script>
    // Category Region

    const btnAddCategory = document.getElementById('btn-add-category')
    const formAddCategory = document.getElementById('form-add-category')

    function showFormAddCategory() {
        btnAddCategory.classList.replace('flex', 'hidden')
        formAddCategory.classList.replace('hidden', 'flex')
    }

    function hideFormAddCategory() {
        btnAddCategory.classList.replace('hidden', 'flex')
        formAddCategory.classList.replace('flex', 'hidden')
    }

    function changeCategoryImage(nodeId) {
        const nodeInput = document.getElementById(nodeId + '-file')
        const nodeImage = document.getElementById(nodeId + '-image')

        nodeImage.src = URL.createObjectURL(nodeInput.files[0])
    }

    function openEditCategory(nodeId, option) {
        const groupIndexButton = document.getElementById(nodeId + '-index-button')
        const groupEditButton = document.getElementById(nodeId + '-edit-button')

        const nodeInputName = document.getElementById(nodeId + '-name')
        const nodeInputFile = document.getElementById(nodeId + '-file')
        const nodeInputFileForm = document.getElementById(nodeId + '-file-input')

        if (option) {
            groupIndexButton.classList.replace('flex', 'hidden')
            groupEditButton.classList.replace('hidden', 'flex')
    
            nodeInputName.readOnly = false
            nodeInputFile.disabled = false
    
            nodeInputFileForm.classList.replace('hidden', 'block')
        } else {
            groupIndexButton.classList.replace('hidden', 'flex')
            groupEditButton.classList.replace('flex', 'hidden')

            nodeInputName.readOnly = true
            nodeInputFile.disabled = true
        
            nodeInputFileForm.classList.replace('block', 'hidden')
        
            location.reload()
        }
    }
</script>
@endpush