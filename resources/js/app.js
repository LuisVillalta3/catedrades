require('./bootstrap');
const $ = require('jquery');
require('jquery-modal');

$(function() {
  $("a[href='#report-movements']").on( "click", function() {
    target = $(this).data("product")
    $('#product').val(target)
  })
});