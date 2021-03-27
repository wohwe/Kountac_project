<?php

namespace Proxies\__CG__\Kountac\KountacBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Mannequin extends \Kountac\KountacBundle\Entity\Mannequin implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = ['path' => NULL];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {
        unset($this->path);

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }

    /**
     * 
     * @param string $name
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->__getLazyProperties())) {
            $this->__initializer__ && $this->__initializer__->__invoke($this, '__get', [$name]);

            return $this->$name;
        }

        trigger_error(sprintf('Undefined property: %s::$%s', __CLASS__, $name), E_USER_NOTICE);
    }

    /**
     * 
     * @param string $name
     * @param mixed  $value
     */
    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->__getLazyProperties())) {
            $this->__initializer__ && $this->__initializer__->__invoke($this, '__set', [$name, $value]);

            $this->$name = $value;

            return;
        }

        $this->$name = $value;
    }

    /**
     * 
     * @param  string $name
     * @return boolean
     */
    public function __isset($name)
    {
        if (array_key_exists($name, $this->__getLazyProperties())) {
            $this->__initializer__ && $this->__initializer__->__invoke($this, '__isset', [$name]);

            return isset($this->$name);
        }

        return false;
    }

    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'id', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'marque', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'picture', 'path', 'file', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'date_ajout', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'date_update', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'nom_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'taille_standard_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'poids_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'taille_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'numero_teint_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'tour_taille_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'tour_poitrine_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'tour_grandes_hanches_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'statut_mannequin'];
        }

        return ['__isInitialized__', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'id', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'marque', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'picture', 'file', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'date_ajout', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'date_update', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'nom_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'taille_standard_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'poids_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'taille_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'numero_teint_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'tour_taille_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'tour_poitrine_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'tour_grandes_hanches_mannequin', '' . "\0" . 'Kountac\\KountacBundle\\Entity\\Mannequin' . "\0" . 'statut_mannequin'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Mannequin $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

            unset($this->path);
        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getUploadRootDir()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUploadRootDir', []);

        return parent::getUploadRootDir();
    }

    /**
     * {@inheritDoc}
     */
    public function getAbsolutePath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAbsolutePath', []);

        return parent::getAbsolutePath();
    }

    /**
     * {@inheritDoc}
     */
    public function getAssetPath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAssetPath', []);

        return parent::getAssetPath();
    }

    /**
     * {@inheritDoc}
     */
    public function preUpload()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'preUpload', []);

        return parent::preUpload();
    }

    /**
     * {@inheritDoc}
     */
    public function upload()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'upload', []);

        return parent::upload();
    }

    /**
     * {@inheritDoc}
     */
    public function preRemoveUpload()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'preRemoveUpload', []);

        return parent::preRemoveUpload();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setTailleStandardMannequin($tailleStandardMannequin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTailleStandardMannequin', [$tailleStandardMannequin]);

        return parent::setTailleStandardMannequin($tailleStandardMannequin);
    }

    /**
     * {@inheritDoc}
     */
    public function getTailleStandardMannequin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTailleStandardMannequin', []);

        return parent::getTailleStandardMannequin();
    }

    /**
     * {@inheritDoc}
     */
    public function setPoidsMannequin($poidsMannequin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPoidsMannequin', [$poidsMannequin]);

        return parent::setPoidsMannequin($poidsMannequin);
    }

    /**
     * {@inheritDoc}
     */
    public function getPoidsMannequin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPoidsMannequin', []);

        return parent::getPoidsMannequin();
    }

    /**
     * {@inheritDoc}
     */
    public function setPath($path)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPath', [$path]);

        return parent::setPath($path);
    }

    /**
     * {@inheritDoc}
     */
    public function getPath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPath', []);

        return parent::getPath();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomMannequin($nomMannequin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomMannequin', [$nomMannequin]);

        return parent::setNomMannequin($nomMannequin);
    }

    /**
     * {@inheritDoc}
     */
    public function getNomMannequin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomMannequin', []);

        return parent::getNomMannequin();
    }

    /**
     * {@inheritDoc}
     */
    public function setTailleMannequin($tailleMannequin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTailleMannequin', [$tailleMannequin]);

        return parent::setTailleMannequin($tailleMannequin);
    }

    /**
     * {@inheritDoc}
     */
    public function getTailleMannequin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTailleMannequin', []);

        return parent::getTailleMannequin();
    }

    /**
     * {@inheritDoc}
     */
    public function setNumeroTeintMannequin($numeroTeintMannequin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNumeroTeintMannequin', [$numeroTeintMannequin]);

        return parent::setNumeroTeintMannequin($numeroTeintMannequin);
    }

    /**
     * {@inheritDoc}
     */
    public function getNumeroTeintMannequin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNumeroTeintMannequin', []);

        return parent::getNumeroTeintMannequin();
    }

    /**
     * {@inheritDoc}
     */
    public function setTourTailleMannequin($tourTailleMannequin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTourTailleMannequin', [$tourTailleMannequin]);

        return parent::setTourTailleMannequin($tourTailleMannequin);
    }

    /**
     * {@inheritDoc}
     */
    public function getTourTailleMannequin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTourTailleMannequin', []);

        return parent::getTourTailleMannequin();
    }

    /**
     * {@inheritDoc}
     */
    public function setTourPoitrineMannequin($tourPoitrineMannequin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTourPoitrineMannequin', [$tourPoitrineMannequin]);

        return parent::setTourPoitrineMannequin($tourPoitrineMannequin);
    }

    /**
     * {@inheritDoc}
     */
    public function getTourPoitrineMannequin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTourPoitrineMannequin', []);

        return parent::getTourPoitrineMannequin();
    }

    /**
     * {@inheritDoc}
     */
    public function setTourGrandesHanchesMannequin($tourGrandesHanchesMannequin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTourGrandesHanchesMannequin', [$tourGrandesHanchesMannequin]);

        return parent::setTourGrandesHanchesMannequin($tourGrandesHanchesMannequin);
    }

    /**
     * {@inheritDoc}
     */
    public function getTourGrandesHanchesMannequin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTourGrandesHanchesMannequin', []);

        return parent::getTourGrandesHanchesMannequin();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatutMannequin($statutMannequin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatutMannequin', [$statutMannequin]);

        return parent::setStatutMannequin($statutMannequin);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatutMannequin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatutMannequin', []);

        return parent::getStatutMannequin();
    }

    /**
     * {@inheritDoc}
     */
    public function setMarque(\Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $marque = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMarque', [$marque]);

        return parent::setMarque($marque);
    }

    /**
     * {@inheritDoc}
     */
    public function getMarque()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMarque', []);

        return parent::getMarque();
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', []);

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function setDateAjout($dateAjout)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateAjout', [$dateAjout]);

        return parent::setDateAjout($dateAjout);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateAjout()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateAjout', []);

        return parent::getDateAjout();
    }

    /**
     * {@inheritDoc}
     */
    public function setDateUpdate($dateUpdate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateUpdate', [$dateUpdate]);

        return parent::setDateUpdate($dateUpdate);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateUpdate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateUpdate', []);

        return parent::getDateUpdate();
    }

    /**
     * {@inheritDoc}
     */
    public function addPicture(\Kountac\KountacBundle\Entity\Media_motif $picture)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPicture', [$picture]);

        return parent::addPicture($picture);
    }

    /**
     * {@inheritDoc}
     */
    public function removePicture(\Kountac\KountacBundle\Entity\Media_motif $picture)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePicture', [$picture]);

        return parent::removePicture($picture);
    }

    /**
     * {@inheritDoc}
     */
    public function getPicture()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPicture', []);

        return parent::getPicture();
    }

    /**
     * {@inheritDoc}
     */
    public function setProduit2(\Kountac\KountacBundle\Entity\Mannequin $produit2 = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProduit2', [$produit2]);

        return parent::setProduit2($produit2);
    }

    /**
     * {@inheritDoc}
     */
    public function getProduit2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProduit2', []);

        return parent::getProduit2();
    }

}