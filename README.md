# Job Application API

A simple API in php to receive a geek job application.

## Example Usage

	curl -i -X POST -d '{"name":"Christoph","email":"christoph@email","intro":"I rock!","links":["http:\/\/www.stackoverflow.com\/me","http:\/\/www.github\/stoph"]}' --header "Content-Type: application/job" http://your.server.com/job.php
