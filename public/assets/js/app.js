String.prototype.linkify = function()
{
    var str = this.toString();

    str = str.replace(/(https?:\/\/[^\s]+)/gim, '<a href="$1">$1</a>', str);
    str = str.replace(/([#|@][^\s]+)/gim, '<a href="http://twitter.com/$1">$1</a>', str);

    return str;
}

$(function()
{
    function getTweets()
    {
        var tweets = [ ];

        $.getJSON('https://api.twitter.com/1/statuses/user_timeline.json?screen_name=ahmednuaman&count=5&callback=?', function(data)
        {
            var ul = $('#twitter-feed').find('ul').empty();
            var tweet;

            for (var i = 0; i < data.length; i++)
            {
                tweet = data[i];

                ul.append('<li>' + tweet.text.linkify() + '</li>');
            }
        });
    }

    getTweets();
});