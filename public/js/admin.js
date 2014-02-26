$( document ).ready(function() {
    $('.delete').click(function(event) {
      event.preventDefault();
      //get correct link for delete
      var deletionLink = $(this).attr('href');

      //create modal that will display confirmation
      var modalDiv = $("<div style='display: none'><p>Are you sure you want to delete this?</p></div>").appendTo("body");
      $(modalDiv).dialog({
        title: "Confirm",
        open: function(){
          //remove autofocus
          $('.ui-dialog :button').blur();
        },
        modal: true,
        buttons: {
          Delete: function () {
              location.href=deletionLink;
          },
          Cancel: function() {
              $(this).dialog("close");
          }
        }
      });
    });
});