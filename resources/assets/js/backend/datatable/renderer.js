/**
 * Render Options
 */
window.DataTableRenderer = {
  renderImage: src => {
    return `<a href="${src}" alt="no image" class="fancy-box"><img class="img-rounded img-preview img-preview-xs img-size-50-50" src="${src}"/></a>`;
  },
  renderActions: data => {
    if (data.length < 1) {
      return '<div class="badge badge-secondary">No Actions</div>';
    }
    let buttons = "",
      more_buttons = "",
      more_links = 0;

    if (Array.isArray(data)) {
      data = data.reduce(function(acc, cur, i) {
        acc[i] = cur;
        return acc;
      }, {});
    }
    for (let key in data) {
      let link = data[key],
        button = "";

      switch (link.type) {
        case "show":
          if (link.group == "more") {
            button = `<a class="text-info" name="btn_show" href="${link.url ||
              "#"}" data-redirect="${
              link.redirect
            }"><i class="fa fa-search text-info"></i> View</a>`;
          } else {
            button = `<a href="${link.url ||
              "#"}" class="btn btn-sm btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="View"></i></a>`;
          }
          break;
        case "edit":
          if (link.group == "more") {
            button = `<a class="text-primary" name="btn_edit" href="${link.url ||
              "#"}" ${
              link.redirect ? "data-redirect='" + link.redirect + "'" : ""
            }><i class="fa fa-pencil text-primary"></i> Edit</a>`;
          } else {
            button = `<a href="${link.url || "#"}" name="btn_edit" ${
              link.redirect ? "data-redirect='" + link.redirect + "'" : ""
            } class="btn btn-sm btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>`;
          }
          break;
        case "update":
          if (link.group == "more") {
            button = `<a class="text-primary" name="btn_update" href="${link.url ||
              "#"}" ${
              link.redirect ? "data-redirect='" + link.redirect + "'" : ""
            }><i class="fa fa-pencil text-primary"></i> Update</a>`;
          } else {
            button = `<a href="${link.url || "#"}" name="btn_update" ${
              link.redirect ? "data-redirect='" + link.redirect + "'" : ""
            } class="btn btn-sm btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Update"></i></a>`;
          }
          break;
        case "destroy":
          if (link.group == "more") {
            button = `<a class="text-danger" name="btn_destroy" href="${link.url ||
              "#"}" ${
              link.redirect ? "data-redirect='" + link.redirect + "'" : ""
            }><i class="fa fa-trash text-danger"></i> Delete</a>`;
          } else {
            button = `<a href="${link.url || "#"}" name="btn_destroy" ${
              link.redirect ? "data-redirect='" + link.redirect + "'" : ""
            } class="btn btn-sm btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>`;
          }
          break;
        case "purge":
          if (link.group == "more") {
            button = `<a class="text-danger" name="btn_purge" href="${link.url ||
              "#"}" ${
              link.redirect ? "data-redirect='" + link.redirect + "'" : ""
            }><i class="fa fa-trash text-danger"></i> Delete</a>`;
          } else {
            button = `<a href="${link.url || "#"}" name="btn_purge" ${
              link.redirect ? "data-redirect='" + link.redirect + "'" : ""
            } class="btn btn-sm btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>`;
          }
          break;
        case "restore":
          if (link.group == "more") {
            button = `<a class="text-info" name="btn_restore" href="${link.url ||
              "#"}" ${
              link.redirect ? "data-redirect='" + link.redirect + "'" : ""
            }><i class="fa fa-refresh text-info"></i> Restore</a>`;
          } else {
            button = `<a href="${link.url || "#"}" name="btn_restore" ${
              link.redirect ? "data-redirect='" + link.redirect + "'" : ""
            } class="btn btn-sm btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="Restore"></i></a>`;
          }
          break;
        default:
          if (link.group == "more") {
            button = `<a class="${link.class || ""}" name="${link.name ||
              ""}" href="${link.url || "#"}" ${
              link.redirect ? "data-redirect='" + link.redirect + "'" : ""
            }><i class="${link.icon || ""}"></i> ${link.label || ""}</a>`;
          } else {
            button = `<a href="${link.url || "#"}" name="${link.name || ""}" ${
              link.redirect ? "data-redirect='" + link.redirect + "'" : ""
            } class="${link.class || ""}"><i class="${link.icon ||
              ""}" data-toggle="tooltip" data-placement="top" title="${link.label ||
              ""}"></i></a>`;
          }
          break;
      }

      if (link.group == "more") {
        more_links++;
        more_buttons += `<li  class="dropdown-item">${button}</li>`;
      } else {
        buttons += button;
      }
    }
    more_buttons = ` <div class="btn-group" role="group">
                        <button id="userActions" type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More </button>
                        <div class="dropdown-menu" aria-labelledby="userActions"> ${more_buttons} </div>
                    </div>`;
    return `<div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                    ${buttons}
                   ${more_links > 0 ? more_buttons : ""}
                </div>`;
  },
  renderMark: data => {
    let options = ``;
    for (let k in data.statuses) {
      let status = data.statuses[k].label || data.statuses[k];
      isActive = k == data.value;
      options += `<option value="${k}" ${
        isActive ? 'selected="true"' : ""
      } >${status.capitalize()}</option>`;
    }
    if (!data.can) {
      return (data.statuses[data.value] || "").capitalize();
    }
    return `
            <select name="status_update" class="form-control" data-link="${
              data.link
            }">
                ${options}
            </select>
        `;
  }
};
