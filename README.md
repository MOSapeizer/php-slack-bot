# PHP Slack Bot


Check [Events API](https://api.slack.com/events-api).

## Install

php >= 5.4


```
  composer install 
  composer dump-autoload -o
```

1. Create slack app and Add Bot feature

    https://api.slack.com/apps/ \[your app id\] /general

2. Install your APP, and save Bot User OAuth Access Token.

    https://api.slack.com/apps/ \[your app id\] /install-on-team
    
3. Enable Subscription. 
    
    https://api.slack.com/apps/ \[your app id\] /event-subscriptions
 
    ![](https://a.slack-edge.com/bfaba/img/api/event_url_verification.png)

4. Subscribe Bot Event ex. message.im

    ![](https://a.slack-edge.com/bfaba/img/api/event_subscriptions.png)



start coding.