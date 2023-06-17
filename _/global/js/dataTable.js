(function ($) {
  "use strict";
  $("#dataTable").dataTable({
    bPaginate: true,
    bLengthChange: false,
    bFilter: true,
    bSort: true,
    bInfo: false,
    bAutoWidth: false,
    pageLength: 15,
    ordering: true,
  });
})(jQuery);
