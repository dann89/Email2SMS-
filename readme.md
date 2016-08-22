# Quick Email to SMS Alert

Standard Laravel 5.2 Framework

## Aim

Basic method to recieve parsed emails from Mailgun and send that message via SMS.

Limited use in this form, basically I required something to parse alarm emails and send them on via text
to ensure a response.

Grab the fields [TO, FROM, SUBJECT, BODY].


## Depends

Currently uses Aloha\Twilio for the Twilio side of things.

## Setup 

Clone, composer install.

TWILIO_SID=
TWILIO_TOKEN=
TWILIO_FROM=
MOBILE=

Route used is /emails, setup Mailgun(and others) to put to URL/emails. Currently sends only the body of the email to sms.
