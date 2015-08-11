<?php
//functions to wait running php code until data is submitted
function isPostRequest() {
    return (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST');
}
function isGetRequest() {
    return (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET');
}
