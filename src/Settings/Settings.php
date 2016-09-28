<?php
/**
 * OpenFireRestAPI is based entirely on official documentation of the REST API
 * Plugin and you can extend it by following the directives of the documentation
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/gnello/PHPOpenFireRestAPI/contributors
 *
 * @author Luca Agnello <luca@gnello.com>
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html
 */

namespace Gnello\OpenFireRestAPI\Settings;

/**
 * Class Settings
 * @package Gnello\OpenFireRestAPI\Settings
 */
class Settings
{
    /**
     * Default Settings
     * Edit this section to configure your client
     */
    const HOST = 'localhost';
    const PORT = '9090';
    const PLUGIN = '/plugins/restapi/v1';
    const SECRET = 'your_secret';
    const SERVER_NAME = 'your_server_name';

    /**
     * @var Settings
     */
    private static $instance;

    /**
     * @var array
     */
    private $register = array();

    /**
     * Settings constructor.
     */
    private function __construct() {}

    /**
     * @return Settings
     */
    static public function getInstance()
    {
        if (is_null(self::$instance)) {
            $settings = new Settings();
            $settings->setHost(self::HOST);
            $settings->setPort(self::PORT);
            $settings->setPlugin(self::PLUGIN);
            $settings->setSecret(self::SECRET);
            $settings->setServerName(self::SERVER_NAME);
            $settings->setSSL(false);
            $settings->setDebug(false);

            self::$instance = $settings;
        }

        return self::$instance;
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    private function set($key, $value)
    {
        return $this->register[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    private function get($key)
    {
        if (!isset($this->register[$key])) {
            return null;
        }

        return $this->register[$key];
    }

    /**
     * @param $host
     * @return mixed
     */
    public function setHost($host)
    {
        return $this->set('host', $host);
    }

    /**
     * @param $port
     * @return mixed
     */
    public function setPort($port)
    {
        return $this->set('port', $port);
    }

    /**
     * @param $plugin
     * @return mixed
     */
    public function setPlugin($plugin)
    {
        return $this->set('plugin', $plugin);
    }

    /**
     * @param $useSSL
     * @return mixed
     */
    public function setSSL($useSSL)
    {
        return $this->set('useSSL', $useSSL);
    }

    /**
     * @param $secret
     * @return mixed
     */
    public function setSecret($secret)
    {
        return $this->set('secret', $secret);
    }

    /**
     * @param $serverName
     * @return mixed
     */
    public function setServerName($serverName)
    {
        return $this->set('serverName', $serverName);
    }

    /**
     * @param $bool
     * @return mixed
     */
    public function setDebug($bool)
    {
        return $this->set('debug', $bool);
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->get('host');
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->get('port');
    }

    /**
     * @return string
     */
    public function getPlugin()
    {
        return $this->get('plugin');
    }

    /**
     * @return bool
     */
    public function isSSL()
    {
        return $this->get('useSSL');
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->get('secret');
    }

    /**
     * @return string
     */
    public function getServerName()
    {
        return $this->get('serverName');
    }

    /**
     * @return bool
     */
    public function isDebug()
    {
        return $this->get('debug');
    }
}
