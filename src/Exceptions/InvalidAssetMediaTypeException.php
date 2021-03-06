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
use CodeInc\AssetsMiddleware\Assets\AssetInterface;
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
     * @var AssetInterface
     */
    private $asset;

    /**
     * InvalidAssetMediaTypeException constructor.
     *
     * @param AssetInterface $asset
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(AssetInterface $asset, int $code = 0, Throwable $previous = null)
    {
        $this->asset = $asset;
        parent::__construct(
            sprintf("The media type '%s' is not allowed for the asset '%s'.",
                $asset->getMediaType(), $asset->getFilename()),
            $code,
            $previous
        );
    }

    /**
     * @return AssetInterface
     */
    public function getAsset():AssetInterface
    {
        return $this->asset;
    }
}