import "./renderer";

window.initDataTable = (el, options, callbacks) => {
  let table_options = {
      processing: false,
      serverSide: true,
      scrollY: "45vh",
      scrollCollapse: false,
      ajax: {},
      columns: [],
      searchDelay: 500,
      order: [[0, "desc"]]
    },
    table = null,
    table_callbacks = {
      processingCallback: () => {},
      processedCallback: response => {},
      initCallback: table => {}
    };
  $.extend(table_options, options);
  $.extend(table_callbacks, callbacks);

  let columns = () => {
    let columns = [];
    for (var i = 0; i < table_options.columns.length; i++) {
      let column = table_options.columns[i];
      switch (column.type) {
        case "actions":
          column.render = data => DataTableRenderer.renderActions(data);
          break;
        case "image":
          column.render = data => DataTableRenderer.renderImage(data);
          break;
        case "status_update":
          column.render = data =>
            data.can
              ? DataTableRenderer.renderMark(data)
              : data.statuses[data.value];
          break;
      }
      columns.push(column);
    }
    return columns;
  };

  table_options.columns = columns();
  table_options.ajax.beforeSend = () => {
    if (table_callbacks.processingCallback) {
      table_callbacks.processingCallback();
    }
  };
  table_options.ajax.dataSrc = response => {
    if (table_callbacks.processedCallback) {
      table_callbacks.processedCallback(response);
    }
    return response.data;
  };
  table_options.fnInitComplete = () => {
    if (table_callbacks.initCallback) {
      table_callbacks.initCallback(table);
    }
  };
  table = el.DataTable(table_options);
  table.columns.adjust();
  return table;
};
