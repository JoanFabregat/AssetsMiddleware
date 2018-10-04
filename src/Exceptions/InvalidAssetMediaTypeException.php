<?php
//
// +---------------------------------------------------------------------+
// | CODE INC. SOURCE CODE                                               |
// +---------------------------------------------------------------------+
// | Copyright (c) 2018 - Code Inc. SAS - All Rights Reserved.           |
// | Visit https://www.codeinc.fr for more information about licensing.  |
// +---------------------------------------------------------------------+
// | NOTICE:  All information contained herein is, and remains the       |
// | property of Code Inc. SAS. The intellectual and technical concepts  |
// | contained herein are proprietary to Code Inc. SAS are protected by  |
// | trade secret or copyright law. Dissemination of this information or |
// | reproduction of this material is strictly forbidden unless prior    |
// | written permission is obtained from Code Inc. SAS.                  |
// +---------------------------------------------------------------------+
//
// Author:   Joan Fabrégat <joan@codeinc.fr>
// Date:     04/10/2018
// Project:  AssetsMiddleware
//
declare(strict_types=1);
namespace CodeInc\AssetsMiddleware\Exceptions;
use Throwable;


/**
 * Class InvalidAssetMediaType
 *
 * @package CodeInc\AssetsMiddleware\Exceptions
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class InvalidAssetMediaTypeException extends \RuntimeException implements AssetsMiddlewareException
{
    /**
     * @var string
     */
    private $assetPath;

    /**
     * @var string
     */
    private $mediaType;

    /**
     * InvalidAssetMediaTypeException constructor.
     *
     * @param string $assetPath
     * @param string $mediaType
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $assetPath, string $mediaType, int $code = 0, Throwable $previous = null)
    {
        $this->assetPath = $assetPath;
        $this->mediaType = $mediaType;
        parent::__construct(
            sprintf("The media type '%s' of the asset '%s' is not allowed.", $mediaType, $assetPath),
            $code,
            $previous
        );
    }

    /**
     * @return string
     */
    public function getAssetPath():string
    {
        return $this->assetPath;
    }

    /**
     * @return string
     */
    public function getMediaType():string
    {
        return $this->mediaType;
    }
}