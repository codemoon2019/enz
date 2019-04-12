// Loaded after CoreUI app.js

/**
 * Holds a global ajax request in case this is not null there will be an option to abort the initial request
 * @param ajax_request
 */
window.ajax_request = null;

/**
 * @param String type
 * @param String link
 *
 * @return Promise
 */
window.ajaxSwal = options => {
  return new Promise((resolve, reject) => {
    swalLoader();
    if (ajax_request) ajax_request.abort();
    $.extend(options, {
      success: response => {
        swal.close();
        resolve(response);
      },
      error: response => {
        swal.close();
        reject(response);
      }
    });
    ajax_request = $.ajax(options);
  });
};

/**
 * Delete through swal confirmation
 *
 * @param String link
 * @param String message
 *
 * @return Promise
 */
window.deleteSwal = (link, message) => {
  return new Promise((resolve, reject) => {
    swal({
      title: message || "Are you sure you want to delete this item?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Delete",
      cancelButtonText: "Cancel",
      closeOnConfirm: false,
      showLoaderOnConfirm: true
    }).then(function(result) {
      if (result.value) {
        ajaxSwal({ url: link, type: "DELETE" })
          .then(response => resolve(response))
          .catch(response => reject(response));
      }
    });
  });
};

/**
 * Restore through swal confirmation
 *
 * @param String link
 * @param String message
 *
 * @return Promise
 */
window.restoreSwal = (link, message) => {
  return new Promise((resolve, reject) => {
    swal({
      title: message || "Are you sure you to restore this item?",
      type: "info",
      showCancelButton: true,
      confirmButtonText: "Restore",
      cancelButtonText: "Cancel",
      showLoaderOnConfirm: true
    }).then(function(result) {
      if (result.value) {
        ajaxSwal({ url: link, type: "PATCH" })
          .then(response => resolve(response))
          .catch(response => reject(response));
      }
    });
  });
};

/**
 * Purge through swal confirmation
 *
 * @param String link
 * @param String message
 * @param String more_message
 *
 * @return Promise
 */
window.purgeSwal = (link, message, more_message) => {
  return new Promise((resolve, reject) => {
    swal({
      title:
        message || "Are you sure you want to delete this item permanently?",
      text:
        more_message ||
        " Anywhere in the application that references this item will most likely error. Proceed at your own risk. This can not be un-done.",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Delete",
      cancelButtonText: "Cancel",
      closeOnConfirm: false,
      showLoaderOnConfirm: true
    }).then(function(result) {
      if (result.value) {
        ajaxSwal({ type: "DELETE", url: link })
          .then(response => resolve(response))
          .catch(response => reject(response));
      }
    });
  });
};

/**
 * Mark through swal confirmation
 *
 * @param String link
 * @param String message
 *
 * @return Promise
 */
window.markSwal = (status, link, message) => {
  return new Promise((resolve, reject) => {
    swal({
      title:
        message ||
        "Are you sure you want to change this item's status to " +
          status.capitalize() +
          "?",
      type: "info",
      showCancelButton: true,
      confirmButtonText: status.capitalize(),
      cancelButtonText: "Cancel",
      showLoaderOnConfirm: true
    }).then(function(result) {
      if (result.value) {
        ajaxSwal({ url: link, type: "PATCH", data: { status: status } })
          .then(response => resolve(response))
          .catch(response => reject(response));
      } else {
        reject(result);
      }
    });
  });
};

/**
 * Action Loader
 *
 * @param String message
 */
window.swalLoader = message => {
  swal({
    title: message || "Loading...",
    text: message,
    imageUrl: window.location.origin + "/img/dual-ring.svg",
    animation: false,
    showConfirmButton: false,
    allowOutsideClick: false
  });
};

/**
 *  Form Submit with loader
 * @param jQuery Selector el
 */
window.cardForm = el => {
  el.on("click", ".btn-submit-continue", function(e) {
    e.preventDefault();
    let link = $(this).attr("data-redirect") || "edit";
    el.append(`<input type="hidden" name="_submission" value="${link}"/>`);
    el.submit();
  });
  el.on("submit", function() {
    pageLoading();
  });
};
window.swalButtons = (el, callbacks) => {
  let callback = {
    destroy: {
      success: (response, el) => {
        toastr.success(response.message);
      },
      error: (response, el) => {
        toastr.error(response.responseTEXT);
      }
    },
    restore: {
      success: (response, el) => {
        toastr.success(response.message);
      },
      error: (response, el) => {
        toastr.error(response.responseTEXT);
      }
    },
    purge: {
      success: (response, el) => {
        toastr.success(response.message);
      },
      error: (response, el) => {
        toastr.error(response.responseTEXT);
      }
    }
  };
  $.extend(callback, callbacks);

  el.on("click", "a[name=btn_destroy]", function(e) {
    e.preventDefault();
    e.stopPropagation();
    deleteSwal($(this).attr("href"))
      .then(response => {
        let redirect = $(this).data("redirect");
        if (
          redirect != "undefined" &&
          redirect != null &&
          redirect != window.location
        ) {
          window.location.href = redirect;
        }
        callback.destroy.success(response, $(this));
      })
      .catch(response => {
        callback.destroy.error(response, $(this));
      });
  });

  el.on("click", "a[name=btn_restore]", function(e) {
    e.preventDefault();
    e.stopPropagation();
    restoreSwal($(this).attr("href"))
      .then(response => {
        let redirect = $(this).data("redirect");
        if (redirect != "undefined" || redirect != null) {
          window.location.href = redirect;
        }
        callback.restore.success(response, $(this));
      })
      .catch(response => {
        callback.restore.error(response, $(this));
      });
  });

  el.on("click", "a[name=btn_purge]", function(e) {
    e.preventDefault();
    e.stopPropagation();
    purgeSwal($(this).attr("href"))
      .then(response => {
        let redirect = $(this).data("redirect");
        if (redirect != "undefined" || redirect != null) {
          window.location.href = redirect;
        }
        callback.purge.success(response, $(this));
      })
      .catch(response => {
        callback.purge.error(response, $(this));
      });
  });

  el.on("click", "a[name=btn_purge]", function(e) {
    e.preventDefault();
    e.stopPropagation();
    purgeSwal($(this).attr("href"))
      .then(response => {
        let redirect = $(this).data("redirect");
        if (redirect != "undefined" || redirect != null) {
          window.location.href = redirect;
        }
        callback.purge.success(response, $(this));
      })
      .catch(response => {
        callback.purge.error(response, $(this));
      });
  });
};

window.pageLoaded = () => {
  // // Scroll to top on page refresh
  $("body")
    .removeClass("processing-page-load")
    .animate({ scrollTop: 0 }, 800);
  // Show the main wrapper when the page is fully loaded
  $(".main-wrapper, .main-footer").fadeTo(500, 1);
  // Remove page loading when the page is fully loaded
  $(".page-loading")
    .fadeTo(500, 0)
    .removeClass("page-loading-show");
  $(".loading")
    .fadeTo(500, 1)
    .removeClass("loading");
  $(".to-load").fadeTo(500, 1);
};

window.pageLoading = () => {
  $(".page-loading")
    .fadeTo(500, 1)
    .addClass("page-loading-show");
  $(".to-load").fadeTo(500, 0);
};

/**
 * jQuery functions
 */

$(window).on("load", function() {
  pageLoaded();
});
$(document).ready(function() {
  cardForm($(".card-form"));
  $("body").on(
    "click",
    'a[href^="http:"]:not(:disabled):not([name]),a[href^="https:"]:not(:disabled):not([name])',
    () => {
      // pageLoading()
    }
  );
  swalButtons($("body"));
});


/* Fileinput */
window.fileinput_delete = (images) => {
	let configs = []
	$.each(images, function(key, item){
		configs[key] = {
      url: item.deleteUrl,
      size: item.size,
      caption: item.name,
      downloadUrl: item.fullSource,
			extra: {
				_method: 'DELETE'
			}
		}
  })
	return configs
}

window.fileinput_config = {
	allowedFileExtensions: ['jpg', 'jpeg', 'png'],
	allowedFileTypes: ['image'],
	browseOnZoneClick: true,
	dropZoneTitle: 'Drag & drop image here …',
	fileActionSettings: {
		showDrag: false,
		showRemove: true,
	},
	filePlural: 'images',
	fileSingle: 'image',
	initialPreviewAsData: true,
  maxFileSize: 1000,
	showCancel: false,
	showClose: false,
	showRemove: false,
	showUpload: false,
	theme: "fa",
}