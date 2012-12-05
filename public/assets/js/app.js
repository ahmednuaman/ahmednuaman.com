$(function()
{
    String.prototype.linkify = function()
    {
        var str = this.toString();

        str = str.replace(/(https?:\/\/[^\s]+)/gim, '<a href="$1">$1</a>', str);
        str = str.replace(/([#|@][^\s]+)/gim, '<a href="http://twitter.com/$1">$1</a>', str);

        return str;
    }

    var GitEntry = function(data)
    {
        var str = '';

        switch (data.type)
        {
            case 'CreateEvent':
            case 'DeleteEvent':
            case 'ForkEvent':
            case 'WatchEvent':
                var action = data.type.replace('Event', '');

                if (action.length < 6)
                {
                    action += 'e';
                }

                str = action + 'd ';

            break;

            case 'GistEvent':
                str = data.payload.action + 'd a gist called <a href="' + data.url + '">\'' + data.payload.desc + '\'</a>';

            break;

            case 'PullRequestEvent':
                str = 'Added a pull request for '

            break;

            case 'PushEvent':
                str = 'Pushed to ';

            break;
        }

        if (data['repository'])
        {
            str += '<a href="http://github.com/' + data.repository.owner + '">' + data.repository.owner + '</a>\
                /<a href="http://github.com/' + data.repository.owner + '/' + data.repository.name + '">\
                ' + data.repository.name + '</a> repo';
        }

        return {
            toString: function()
            {
                return str;
            }
        };
    }

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

    function getGithubFeed()
    {
        $.getJSON('https://github.com/ahmednuaman.json?callback=?', function(data)
        {
            var ul = $('#github-feed').find('ul').empty();
            var entry;

            for (var i = 0; i < 5; i++)
            {
                entry = new GitEntry(data[i]);

                ul.append('<li>' + entry.toString() + '</li>');
            }
        });
    }

    function getTweets()
    {
        $.getJSON('https://api.twitter.com/1/statuses/user_timeline.json?screen_name=ahmednuaman&count=10&exclude_replies=true&callback=?', function(data)
        {
            var ul = $('#twitter-feed').find('ul').empty();
            var tweet;

            for (var i = 0; i < 5; i++)
            {
                tweet = data[i];

                ul.append('<li>' + tweet.text.linkify() + '</li>');
            }
        });
    }

    getBlogFeed();
    getGithubFeed();
    getTweets();
});