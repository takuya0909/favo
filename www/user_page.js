function get_param(name,url)
{
  if(!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
  results = regex.exec(url);
  if(!results) return null;
  if(!results[2]) return false;
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}

$(document).on('click','favorite_btn',function(e){
  e.stopPropagation();
  var $this = $(this),
      page_id = get_param('page_id'),
      post_id = get_param('procode');
  $.ajax({
    type: 'POST',
    url: 'user_disp.php',
    dataType: 'json',
    data: {page_id: page_id,
           post_id: post_id}
  }).done(function(data){
    location.reload();
  }).fail(function(){
    location.reload();
  });
});