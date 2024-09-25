jQuery(function ($) {
    $(document).on('change','.checkall',function(e){
        $(this).closest('.store__list__table').find('tbody .select input:checkbox').prop('checked', this.checked);
    })

    $(document).on('change','.store__list__table tbody .select input:checkbox',function(e){
        $(this).closest('.store__list__table').find('.checkall').prop('checked', '');
    })

    $('#birthday').datepicker({dateFormat: "yy-mm-dd"});
    $('#publish_date').datepicker({dateFormat: "yy/mm/dd"});

    $('#images').on('change', function() {
        previewImages(this,'.images-preview-div');
    })
    var previewImages = function(input,imgPreviewPlaceholder) {
        if(input.files) {
            var allItems = $(".images-preview-div").children();
            var filesAmount = input.files.length;
            var index = 0;
            for (var i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = (function(i, event) { 
                    let imagePreview = $('<div class="image-preview" data-index="' + (allItems.length + index + 1) + '"></div>');
                    var deleteIcon = $('<span class="delete-icon" data-index="' + (index) + '"><i  class="fa fa-trash-alt" style="color:red"></i></span>');
                    deleteIcon.appendTo(imagePreview);
                    $($.parseHTML('<img class="img-preview">')).attr('src',event.target.result).appendTo(imagePreview)
                    imagePreview.appendTo(imgPreviewPlaceholder);
                    index++;
                }).bind(reader, i);
                reader.readAsDataURL(input.files[i]);
            }
        }
    }

    $(document).on('click','.delete-icon',function(){
        let parent = $(this).parent();
        if (parent.data('id') != undefined) {
            removeImage(parent.data('url'));
        } else {
            removeFile(parseInt($(this).attr('data-index')));
        }
        parent.remove();
        setNumberItem();
    });

    function removeFile(index){
        var attachments = document.getElementById("images").files;
        var fileBuffer = new DataTransfer();
    
        // append the file list to an array iteratively
        for (let i = 0; i < attachments.length; i++) {
            // Exclude file in specified index
            if (index !== i)
                fileBuffer.items.add(attachments[i]);
        }
        
        // Assign buffer to file input
        document.getElementById("images").files = fileBuffer.files;
    }

    $(document).on('click', '.js-on-click', function (e) {
        $('#images').trigger('click')
    })

    $('#started_at,#ended_at').datepicker({dateFormat: "yy-mm-dd"});
    $('#started_time_at,#ended_time_at').datetimepicker();
    $('#checkbox-show-button').change(function() {
        if ($(this).is(':checked')) {
            $('.content-footer').show();
        } else {
            $('.content-footer').hide();
        }
    });

    $("#category-icon, #banner-url-image").on("change", function(event) {
        var file = event.target.files[0];
        let imagePreview = document.getElementById("preview-image");
        if (file) {
            var reader = new FileReader();
            reader.onload = function(event) {
                imagePreview.src = event.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    })

    function setNumberItem() {
        var allItems = $(".images-preview-div").children();
        if (allItems.length) {
            $.each(allItems, function (index, value) {
                if ($(this).data('id') == undefined) {
                    $(this).find('.delete-icon').attr({'data-index':(index - 1)});
                }
                $(this).attr({'data-index':(index + 1)});
            })
        }
    }

    function removeImage(url){
        $.ajax({
            url: url,
            method: 'POST',
            data: {},
            dataType: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(response)
            {
                if(response.message === 'success') {
                    alert('画像は正常に削除されました');
                }
            },
            error: function(response) {
                if(response.message === 'error') {
                    alert('Error');
                }
            }
        });
    }
})