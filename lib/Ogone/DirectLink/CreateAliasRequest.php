<?php
/*
 * This file is part of the Marlon Ogone package.
 *
 * (c) Marlon BVBA <info@marlon.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ogone\DirectLink;

use Ogone\AbstractRequest;
use Ogone\ShaComposer\ShaComposer;

class CreateAliasRequest extends AbstractRequest
{

    const TEST = "https://test-securepay.eupayglobe.com/ncol/test/alias_gateway_utf8.asp";
    const PRODUCTION = "https://securepay.eupayglobe.com/ncol/prod/alias_gateway_utf8.asp";

    public function __construct(ShaComposer $shaComposer)
    {
        $this->shaComposer = $shaComposer;
        $this->ogoneUri = self::TEST;
    }

    public function getRequiredFields()
    {
        return array(
            'pspid', 'accepturl', 'exceptionurl'
        );
    }

    public function getValidOgoneUris()
    {
        return array(self::TEST, self::PRODUCTION);
    }

    public function setAlias(Alias $alias)
    {
        $this->parameters['alias'] = (string) $alias;
    }
}
