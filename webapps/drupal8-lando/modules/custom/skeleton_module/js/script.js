/**
* @file
*/

(function ($, Drupal) {
Drupal.AjaxCommands.prototype.append = function (ajax, response, status) {
  console.log(response.message);
}

})(jQuery, Drupal);
