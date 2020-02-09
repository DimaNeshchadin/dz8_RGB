<?php


namespace App;

final class ValueObject
{
    private $red;
    private $green;
    private $blue;

    public function __construct($red, $green, $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    /**
     * @return mixed
     */
    public function getRed()
    {
        return $this->red;
    }

    /**
     * @param mixed $red
     */
    private function setRed($red): void
    {
        if ($red < 0 && $red > 255) {
            throw new \InvalidArgumentException('Invalid RED value');
        }
        $this->red = $red;
    }

    /**
     * @return mixed
     */
    public function getGreen()
    {
        return $this->green;
    }


    /**
     * @param mixed $green
     */
    private function setGreen($green): void
    {
        if ($green < 0 && $green > 255) {
            throw new \InvalidArgumentException('Invalid GREEN value');
        }
        $this->green = $green;
    }

    /**
     * @return mixed
     */
    public function getBlue()
    {
        return $this->blue;
    }

    /**
     * @param mixed $blue
     */
    private function setBlue($blue): void
    {
        if ($blue < 0 && $blue > 255) {
            throw new \InvalidArgumentException('Invalid BLUE value');
        }
        $this->blue = $blue;
    }

    public function equals(Color $color)
    {
        if (($this->red === $this->green)
            && ($this->green === $this->blue)
            && ($this->blue === $this->red)) {
            return true;
        }
        return false;
    }

    /**
     * @param ValueObject $
     * @return ValueObject
     */
    public static function random()
    {
        return new self(
            rand(0, 255),
            rand(0, 255),
            rand(0, 255)
        );
    }

    public function mix(ValueObject $color)
    {
        return new self(
            $this->red + $color->red / 2,
            $this->green + $color->green / 2,
            $this->blue + $color->blue / 2,
        );
    }

    public function __toString()
    {
        return $this->red . ', ' . $this->green . ', ' . $this->blue;
        // TODO: Implement __toString() method.
    }
}
