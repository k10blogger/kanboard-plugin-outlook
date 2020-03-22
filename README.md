Outlook plugin for Kanboard
=========================

Receive Kanboard notifications on Outlook.

Author
------

- Siddharth Kaul
- License MIT

Requirements
------------

- Kanboard >= 1.0.37

Installation
------------

You have the choice between 3 methods:

1. Install the plugin from the Kanboard plugin manager in one click
2. Download the zip file and decompress everything under the directory `plugins/Outlook`
3. Clone this repository into the folder `plugins/Outlook`

Note: Plugin folder is case-sensitive.

Configuration
-------------

Firstly, you have to generate a new webhook url in Outlook (**Configured Integrations > Incoming Webhook**) [from here](https://docs.microsoft.com/en-us/microsoftteams/platform/webhooks-and-connectors/how-to/connectors-using).

You can define only one webhook url (**Settings > Integrations > Outlook**) and override the channel for each project and user.

### Receive individual user notifications

- Go to your user profile then choose **Integrations > Outlook**
- Copy and paste the webhook url from Outlook or leave it blank if you want to use the global webhook url
- Use `@username` to receive direct message to your user
- Enable Outlook in your user notifications **Notifications > Outlook**

### Receive project notifications to a room

- Go to the project settings then choose **Integrations > Outlook**
- Copy and paste the webhook url from Outlook or leave it blank if you want to use the global webhook url
- Use `#channel` to receive messages in a specific channel
- Enable Outlook in your project notifications **Notifications > Outlook**

## Troubleshooting

- Enable the debug mode
- All connection errors with the Outlook API are recorded in the log files `data/debug.log` or syslog
