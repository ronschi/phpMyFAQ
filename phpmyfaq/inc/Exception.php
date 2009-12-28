<?php
/**
 * phpMyFAQ main exception class
 *
 * PHP Version 5.2.0
 * 
 * The contents of this file are subject to the Mozilla Public License
 * Version 1.1 (the "License"); you may not use this file except in
 * compliance with the License. You may obtain a copy of the License at
 * http://www.mozilla.org/MPL/
 *
 * Software distributed under the License is distributed on an "AS IS"
 * basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the
 * License for the specific language governing rights and limitations
 * under the License.
 * 
 * @category  phpMyFAQ
 * @package   PMF_Exception
 * @author    Thorsten Rinne <thorsten@phpmyfaq.de>
 * @copyright 2009 phpMyFAQ Team
 * @license   http://www.mozilla.org/MPL/MPL-1.1.html Mozilla Public License Version 1.1
 * @link      http://www.phpmyfaq.de
 * @since     2009-12-28
 */

/**
 * PMF_Exception
 * 
 * @category  phpMyFAQ
 * @package   PMF_Exception
 * @author    Thorsten Rinne <thorsten@phpmyfaq.de>
 * @copyright 2009 phpMyFAQ Team
 * @license   http://www.mozilla.org/MPL/MPL-1.1.html Mozilla Public License Version 1.1
 * @link      http://www.phpmyfaq.de
 * @since     2009-12-28
 */
class PMF_Exception extends Exception
{
    /**
     * Converts PMF_Exception to a string
     *
     * @return string
     */
    public function __toString()
    {
        $exception = sprintf("PMF_Exception %s with message %s in %s: %s\nStack trace:\n%s",
            __CLASS__,
            $this->getMessage(),
            $this->getFile(),
            $this->getLine(),
            $this->getTraceAsString());
        
        return $exception;
    }
}