String.prototype.linkify = function()
{
    var str = this.toString();

    str = str.replace(/(https?:\/\/[^\s]+)/gim, '<a href="$1">$1</a>', str);
    str = str.replace(/([#|@][^\s]+)/gim, '<a href="http://twitter.com/$1">$1</a>', str);

    return str;
}

$(function()
{
    function getBlogFeed()
    {
        $.getJSON('https://ajax.googleapis.com/ajax/services/feed/load?v=1.0&q=http://feeds.feedburner.com/ahmednuaman&callback=?', function(data)
        {
            var entries = data.responseData.feed.entries;
            var ul = $('#blog-feed').find('ul').empty();
            var entry;

            for (var i = 0; i < entries.length; i++)
            {
                entry = entries[i];

                ul.append('<li><a href="' + entry.link + '">' + entry.title + '</a></li>');
            }
        });
    }

    function getTweets()
    {
        $.getJSON('https://api.twitter.com/1/statuses/user_timeline.json?screen_name=ahmednuaman&count=5&exclude_replies=true&callback=?', function(data)
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

    getBlogFeed();
    getTweets();
});