<?php

namespace App\Infrastructure\Http;

use Mockery\Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class HTTPStatus
 * @package App\Infrastructure\Http
 */
class HTTPStatus extends Response
{
    /**
     * Get error message
     * @param integer $code
     * @return mixed
     * @throws \HttpException
     */
    public static function getMessageForCode(int $code)
    {
        if (! key_exists($code, Response::$statusTexts)) {
            throw new Exception(sprintf("HTTP code %s is not valid", $code));
        }

        return Response::$statusTexts[$code];
    }

    /**
     * Status code error exist
     * @param integer $code
     * @return boolean
     */
    public static function isError(int $code) :boolean
    {
        return (is_numeric($code) && $code >= Response::HTTP_BAD_REQUEST) ? true : false;
    }

        /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public static function sendResponse($result, $code = self::HTTP_OK)
    {
        return $result
                    ->response()
                    ->setStatusCode($code);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Undocumented function
     *
     * @param integer $code
     * @param string $message
     * @param array $errors
     * @return json
     */
    public static function sendError(int $code = self::HTTP_NOT_FOUND,$message = null,$errors = [])
    {
        $resultError = [
            'success' => false,
            'message' => $message ? $message : self::getMessageForCode($code)
        ];

        if(!empty($errors))
            $resultError['errors'] = $errors;
        
        return response()->json($resultError, $code);
    }
}