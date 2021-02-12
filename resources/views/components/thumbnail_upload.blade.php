<div x-data="thumbnailUpload(`{{$currentSrc}}`, `{{$url}}`)" class="flex items-center justify-center px-6 pt-5 pb-6 mt-2 border-2 border-gray-300 border-dashed rounded-md sm:px-3" style="height: calc(100% - 28px);">
    <template x-if="!blob">
        <div class="space-y-1 text-center">
            <svg stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true" class="w-12 h-12 mx-auto text-gray-400">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <div class="flex text-sm text-gray-600">
                <label for="file-upload" class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <span>Upload a file</span>
                    <input x-on:change="handleChange" type="file" id="file-upload" name="file-upload" class="sr-only">
                </label>
                <p class="pl-1">or drag and drop</p>
            </div>
            <p class="text-xs text-gray-500">
                PNG, JPG, GIF up to 10MB
            </p>
        </div>
    </template>
    <template x-if="blob">
        <div>
            <img x-bind:src="blob" />
            <div class="mt-4 space-x-2">
                <label for="file-upload" class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <span>Upload a new file</span>
                    <input x-on:change="handleChange" type="file" id="file-upload" name="file-upload" class="sr-only">
                </label>
            </div>
        </div>
    </template>
</div>

<script>
    function thumbnailUpload(currentSrc, url) {
        return {
            currentSrc,
            file: null,
            blob: currentSrc,
            loading: false,
            error: false,
            handleChange(upload) {
                this.file = upload.target.files[0];
                if (this.file) {
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        this.blob = e.target.result;
                        this.upload()
                    };
                    reader.readAsDataURL(this.file);
                }
            },
            async upload() {
                if (this.loading) return;
                this.loading = true;
                let token = document.querySelector('meta[name="csrf-token"]')
                try {
                    let formData = new FormData();

                    formData.append("thumbnail", this.file);
                    const response = await fetch(
                        url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': token.content
                            },
                            body: formData
                        }
                    );
                    this.error = null;
                } catch (err) {
                    console.log(err)
                }
                this.isLoading = false;
            }
        }
    }
</script>