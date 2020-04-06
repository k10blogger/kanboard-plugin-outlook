Outlook plugin for Kanboard
=========================

Receive Kanboard notifications on Outlook.
Would like to thank Bombardier Transportation India Pvt Ltd. for allowing me to share this with the world and let me work on it during friday office hours :). 

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

You can define only one webhook url (**Settings > Integrations > Outlook**).
To redirect to specific channel or user a new webhook url is needed for each project and user separately. Only one of the webhook url can be used.

### Receive individual user notifications

- Go to your user profile then choose **Integrations > Outlook**
- Copy and paste the webhook url from Outlook
- Enable Outlook in your user notifications **Notifications > Outlook**

### Receive project notifications

- Go to the project settings then choose **Integrations > Outlook**
- Copy and paste the webhook url from Outlook
- Enable Outlook in your project notifications **Notifications > Outlook**

## Troubleshooting

- Enable the debug mode
- All connection errors with the Outlook API are recorded in the log files `data/debug.log` or syslog
