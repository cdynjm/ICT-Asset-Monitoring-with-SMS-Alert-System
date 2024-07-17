<!-- The Modal -->
<div class="modal fade" id="registerAssetModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Asset</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-register-asset'></div>
                    <form id="register-asset" action="">
                        @csrf

                            <p class="text-sm">Asset Information</p>

                            <label for="" class="mt-2">Property Name</label>
                            <input type="text" class="form-control" name="property" required>

                            <label for="" class="mt-2">Person in Charge</label>
                            <select name="person" id="person" class="form-select" required>
                                <option value="">Select...</option>
                                @foreach ($instructor as $ins)
                                    <option value="{{ $ins->id }}">{{ $ins->name }}</option>
                                @endforeach
                            </select>

                            <label for="" class="mt-2">Model Number</label>
                            <input type="text" class="form-control" name="model_number" required>

                            <label for="" class="mt-2">Serial Number</label>
                            <input type="text" class="form-control" name="serial_number" required>
                            
                            <label for="" class="mt-2">Location</label>
                            <select name="room" class="form-select" id="" required>
                                <option value="">Select...</option>
                                @foreach ($rooms as $ro)
                                <option value="{{ $ro->id }}">{{ $ro->room }}</option>
                                @endforeach
                            </select>

                            <label for="" class="mt-2">Upload Picture</label>
                            <input type="file" class="form-control mb-2" name="photo" id="photo" onchange="viewPhoto(this);" required>
                            <center>
                                <img src="{{ asset('storage/icon/photo-placeholder.jpg') }}" alt="" class="mt-4 rounded img-fluid" id="asset-photo">
                            </center>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info mt-4"> Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 

<script>
    const compressImage = async (file, { quality = 1, type = file.type }) => {
        // Get as image data
        const imageBitmap = await createImageBitmap(file);

        // Draw to canvas
        const canvas = document.createElement('canvas');
        canvas.width = imageBitmap.width;
        canvas.height = imageBitmap.height;
        const ctx = canvas.getContext('2d');
        ctx.drawImage(imageBitmap, 0, 0);

        // Turn into Blob
        const blob = await new Promise((resolve) =>
            canvas.toBlob(resolve, type, quality)
        );

        // Turn Blob into File
        return new File([blob], file.name, {
            type: blob.type,
        });
    };

    // Get the selected file from the file input
    const input = document.querySelector('#photo');
    input.addEventListener('change', async (e) => {
        // Get the files
        const { files } = e.target;

        // No files selected
        if (!files.length) return;

        // We'll store the files in this data transfer object
        const dataTransfer = new DataTransfer();

        // For every file in the files list
        for (const file of files) {
            // We don't have to compress files that aren't images
            if (!file.type.startsWith('image')) {
                // Ignore this file, but do add it to our result
                dataTransfer.items.add(file);
                continue;
            }

            // We compress the file by 50%
            const compressedFile = await compressImage(file, {
                quality: 0.4,
                type: 'image/jpeg'
            });

            // Save back the compressed file instead of the original file
            dataTransfer.items.add(compressedFile);
        }

        // Set value of the file input to our new files list
        e.target.files = dataTransfer.files;
    });
</script>