var themes = {
    "default": "http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css",
    "cerulean": "http://bootswatch.com/cerulean/bootstrap.min.css",
    "cosmo": "http://bootswatch.com/cosmo/bootstrap.min.css",
    "cyborg": "http://bootswatch.com/cyborg/bootstrap.min.css",
    "flatly": "http://bootswatch.com/flatly/bootstrap.min.css",
    "journal": "http://bootswatch.com/journal/bootstrap.min.css",
    "readable": "http://bootswatch.com/readable/bootstrap.min.css",
    "simplex": "http://bootswatch.com/simplex/bootstrap.min.css",
    "slate": "http://bootswatch.com/slate/bootstrap.min.css",
    "spacelab": "http://bootswatch.com/spacelab/bootstrap.min.css",
    "united": "http://bootswatch.com/united/bootstrap.min.css"
};
$(document).ready(function() {
    var themesheet = $('<link href="' + themes['default'] + '" rel="stylesheet" />');
    themesheet.appendTo('head');

    $("select").change(function(){
        var themeurl = themes[$(this).find('option:selected').attr('data-theme')];
        themesheet.attr('href', themeurl);
    });
});