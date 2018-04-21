window.onload = function ()
{
   $('.suggestions-row').click(function(){
       location.href = $(this).find('.suggestion-link').attr('href');
   });
}