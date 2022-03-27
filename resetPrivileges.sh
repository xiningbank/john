#!/bin/bash

sudo chown -R www-data:www-data storage/logs
sudo chown -R www-data:www-data storage/framework/cache
sudo chown -R www-data:www-data storage/framework/sessions
sudo chown -R www-data:www-data storage/framework/views

sudo chown -R www-data:www-data storage/app/uploads
