<?php

namespace ShinTeam\Interfaces;

interface interfaceResponse
{
    function setMessageStatus($message);

    function setStatus($status);

    function setResponse($body);

    public function toJson();
}