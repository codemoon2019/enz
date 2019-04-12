Dropzone.autoDiscover = false;
(function ($) {
    // Multiple Images
    $.fn.multipleImageDropzone = function (options, callbacks) {
        let form = $(this),
            settings = $.extend({
                dropzone: '',
                has_images: [],
                paramName: 'images',
                acceptedFiles: 'image/*',
                maxFilesize: 2,
                maxFile: 10,
                required: false,
                capture: 'image/*',
                images: [],
                parallelUploads: 10000,
            }, options);
        return this.each(function () {
            if (settings.dropzone === '') {
                toastr.error('Please specify a dropzone first');
                console.log('Please specify a dropzone first');
                return;
            }
            var dropzone = new Dropzone(settings.dropzone, {
                url: form.attr('action'),
                autoProcessQueue: false,
                type: 'POST',
                paramName: settings.paramName,
                uploadMultiple: true,
                maxFiles: settings.maxFiles,
                maxFilesize: settings.maxFilesize,
                acceptedFiles: settings.acceptedFiles,
                parallelUploads: settings.parallelUploads,
                addRemoveLinks: true,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dictRemoveFileConfirmation: "Are you sure you want to remove this image?",
                init: function () {
                    var myDropzone = this;
                    if (settings.images) {
                        for (var i = 0; i < settings.images.length; i++) {
                            let image = settings.images[i];
                            let file = {
                                name: image.group,
                                url: image.source,
                                deleteUrl: image.source_delete,
                                saved: true
                            };
                            myDropzone.emit("addedfile", file);
                            myDropzone.emit("thumbnail", file, image.source);
                            myDropzone.emit("success", file);
                            myDropzone.emit("complete", file);
                            myDropzone.files.push(file);
                        }
                    }
                    // removing Files
                    this.on('removedfile', function (file) {
                        if (file.status == 'error' || !file.saved) {
                            return
                        }
                        if (settings.required) {
                            if (myDropzone.files.length < 2) {
                                myDropzone.options.addRemoveLinks = false
                            } else {
                                myDropzone.options.addRemoveLinks = true
                            }
                        }
                        return ajaxSwal({url: file.deleteUrl, type: 'DELETE'})
                            .then(response => {
                                pageLoading();
                                window.location.reload()
                            })
                            .catch(response => {
                                toastr.error(response.responseText);
                                return void 0;
                            })
                    });
                    this.on("maxfilesexceeded", function (file) {
                        toastr.error("You are not allowed to chose more than " + settings.maxFiles + " file!");
                        this.removeFile(file);
                    });

                    // Sending data
                    this.on("sendingmultiple", function (file, xhr, formData) {
                        form.find('select, input, textarea, textarea.form-ckeditor').each(function (key, value) {
                            var name = $(this).attr('name');
                            if (name != 'undefined') {
                                if ($(this).hasClass('form-ckeditor')) {
                                    if (CKEDITOR && CKEDITOR.instances[$(this).attr('id')]) {
                                        formData.append(name, CKEDITOR.instances[$(this).attr('id')].getData());
                                    } else {
                                        formData.append(name, $(this).val());
                                    }
                                } else {
                                    formData.append(name, $(this).val());
                                }
                            }

                        });
                        form.find('[type=checkbox]').each(function () {
                            var name = $(this).attr('name');
                            formData.append(name, $(this).is(':checked'));
                        })
                    });

                    form.submit(function (e) {
                        e.preventDefault();
                        // e.stopPropagation()
                        if (settings.required && myDropzone.getQueuedFiles().length <= 0) {
                            pageLoaded();
                            toastr.error('Please drop images on the container or click the container to select images.');

                        } else {
                            if (myDropzone.getQueuedFiles().length > 0) {
                                myDropzone.processQueue();
                            } else {
                                form.off('submit').submit()
                            }
                        }
                    });

                    this.on("successmultiple", function (files, response) {
                        // Gets triggered when the files have successfully been sent.
                        // Redirect user or notify of success.
                        toastr.success(response.message);
                        setTimeout(function () {
                            if (response.link) {
                                window.location.href = response.link
                            } else {
                                pageLoaded()
                            }
                        }, 1000)
                    });

                    this.on("errormultiple", function (files, response) {
                        // Gets triggered when there was an error sending the files.
                        // Maybe show form again, and notify user of error
                        for (var i = 0; i < files.length; i++) {
                            myDropzone.removeFile(files[i]);
                        }
                        toastr.error(response.message || response);
                        form.find('[name=_submission]').remove();
                        pageLoaded()
                    });
                }
            })
        })
    };
    // Single Image
    $.fn.imageDropzone = function (options, callbacks) {
        let form = $(this),
            settings = $.extend({
                dropzone: '',
                paramName: 'images[]',
                acceptedFiles: 'image/*',
                maxFilesize: 2,
                required: true,
                capture: 'image/*',
                image: null
            }, options);
        return this.each(function () {
            if (settings.dropzone === '') {
                toastr.error('Please specify a dropzone first');
                console.log('Please specify a dropzone first');
                return;
            }
            var dropzone = new Dropzone(settings.dropzone, {
                url: form.attr('action'),
                autoProcessQueue: false,
                type: 'POST',
                paramName: settings.paramName,
                uploadMultiple: false,
                maxFiles: 1,
                maxFilesize: settings.maxFilesize,
                acceptedFiles: settings.acceptedFiles,
                addRemoveLinks: true,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                init: function () {
                    var myDropzone = this;
                    this.on("maxfileexceeded", function (file) {
                        toastr.error("You are not allowed to chose more than " + settings.maxFiles + " file!");
                        this.removeFile(file);
                    });

                    // Sending data
                    this.on("sending", function (file, xhr, formData) {
                        form.find('select, input, textarea, textarea.form-ckeditor').each(function (key, value) {
                            var name = $(this).attr('name');
                            if (name != 'undefined') {
                                if ($(this).hasClass('form-ckeditor')) {
                                    if (CKEDITOR && CKEDITOR.instances[$(this).attr('id')]) {
                                        formData.append(name, CKEDITOR.instances[$(this).attr('id')].getData());
                                    } else {
                                        formData.append(name, $(this).val());
                                    }
                                } else {
                                    formData.append(name, $(this).val());
                                }
                            }

                        });
                        form.find('[type=checkbox]').each(function () {
                            var name = $(this).attr('name');
                            formData.append(name, $(this).is(':checked'));
                        })
                    });

                    form.submit(function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        if (settings.required && myDropzone.getQueuedFiles().length <= 0) {
                            pageLoaded();
                            toastr.error('Please drop images on the container or click the container to select images.');

                        } else {
                            if (myDropzone.getQueuedFiles().length > 0) {
                                myDropzone.processQueue();
                            } else {
                                form.submit()
                            }
                        }
                    });

                    this.on("success", function (files, response) {
                        // Gets triggered when the files have successfully been sent.
                        // Redirect user or notify of success.
                        toastr.success(response.message);
                        setTimeout(function () {
                            if (response.link) {
                                window.location.href = response.link
                            } else {
                                pageLoaded()
                            }
                        }, 1000)
                    });

                    this.on("error", function (file, response) {
                        // Gets triggered when there was an error sending the files.
                        // Maybe show form again, and notify user of error
                        myDropzone.removeFile(file);
                        toastr.error(response.message || response);
                        form.find('[name=_submission]').remove();
                        pageLoaded()
                    });
                }
            })
        })
    };
})(jQuery);