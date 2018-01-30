<?php

namespace Kountac\KountacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Media_motif
 *
 * @ORM\Table(name="media_motif")
 * @ORM\Entity(repositoryClass="Kountac\KountacBundle\Repository\Media_motifRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Media_motif
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
 
    /**
    * @ORM\PostLoad()
    */
    public function postLoad()
    {
        $this->modifieLe = new \DateTime();
    }
           
   
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path2;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path3;
    
    public $file;
    
    public $file2;
    
    public $file3;
    
    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/uploadProduits';
    }
    
    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }
    
    public function getAbsolutePath2()
    {
        return null === $this->path2 ? null : $this->getUploadRootDir().'/'.$this->path2;
    }
    
    public function getAbsolutePath3()
    {
        return null === $this->path3 ? null : $this->getUploadRootDir().'/'.$this->path3;
    }
    
    public function getAssetPath()
    {
        return 'uploadProduits/'.$this->path;
    }
    
    public function getAssetPath2()
    {
        return 'uploadProduits/'.$this->path2;
    }
    
    public function getAssetPath3()
    {
        return 'uploadProduits/'.$this->path3;
    }
    
    /**
     * @ORM\Prepersist()
     * @ORM\Preupdate()
     */
    public function preUpload()
    {
        $this->tempFile = $this->getAbsolutePath();
        $this->oldFile = $this->getPath();
        $this->modifieLe = new \DateTime();
        
        $this->tempFile2 = $this->getAbsolutePath2();
        $this->oldFile2 = $this->getPath2();
        $this->modifieLe2 = new \DateTime();
        
        $this->tempFile3 = $this->getAbsolutePath3();
        $this->oldFile3 = $this->getPath3();
        $this->modifieLe3 = new \DateTime();
        
        if (null !== $this->file){
            $this->path = sha1(uniqid (mt_rand (),TRUE)).'.'.$this->file->guessExtension();
        }
        if (null !== $this->file2){
            $this->path2 = sha1(uniqid (mt_rand (),TRUE)).'2'.'.'.$this->file->guessExtension();
        }
        if (null !== $this->file3){
            $this->path3 = sha1(uniqid (mt_rand (),TRUE)).'3'.'.'.$this->file->guessExtension();
        }
    }

    
    /**
     * @ORM\Postpersist()
     * @ORM\Postupdate()
     */
    public function upload()
    {
         if (null !== $this->file) 
         {
             $this->file->move($this->getUploadRootDir(),$this->path);
             unset($this->file);
             
             if ($this->oldFile != null){
                 unlink ($this->tempFile);
             }
         }
         
         if (null !== $this->file2) 
         {
             $this->file2->move($this->getUploadRootDir(),$this->path2);
             unset($this->file2);
             
             if ($this->oldFile2 != null) {
                 unlink ($this->tempFile2);
             }
         }
         
         if (null !== $this->file3) 
         {
             $this->file3->move($this->getUploadRootDir(),$this->path3);
             unset($this->file3);
             
             if ($this->oldFile3 != null) {
                 unlink ($this->tempFile3);
             }
         }
    }
    
    
    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        $this->tempFile = $this->getAbsolutePath();
        
        $this->tempFile2 = $this->getAbsolutePath2();
        
        $this->tempFile3 = $this->getAbsolutePath3();
    }
    
           
            
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    
    public function getPath()
    {
        return $this->path;
    }
    
    /**
     * Set path
     *
     * @param string $path
     * @return Media
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }
    
    
    public function getPath2()
    {
        return $this->path2;
    }
    
    /**
     * Set path2
     *
     * @param string $path2
     * @return Media
     */
    public function setPath2($path2)
    {
        $this->path2 = $path2;

        return $this;
    }
    
    public function getPath3()
    {
        return $this->path3;
    }
    
    /**
     * Set path3
     *
     * @param string $path3
     * @return Media_motif
     */
    public function setPath3($path3)
    {
        $this->path3 = $path3;

        return $this;
    }
    
    public function __toString()
    {
       
    }
}
