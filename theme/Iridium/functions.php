<?php

if (!function_exists('component_exists')) {

    function component_exists($id) {

        global $components;

        if (!$components) {

             if (file_exists(GSDATAOTHERPATH.'components.xml')) {

                $data = getXML(GSDATAOTHERPATH.'components.xml');

                $components = $data->item;

            } else {

                $components = array();

            }

        }

        $exists = FALSE;

        if (count($components) > 0) {

            foreach ($components as $component) {

                if ($id == $component->slug) {

                    $exists = TRUE;

                    break;

                }

            }

        }

        return $exists;

    }

}

if (!function_exists('getTextBetweenTags')) {

function getTextBetweenTags($tag, $html, $strict=0)

{

    /*** a new dom object ***/

    $dom = new domDocument;



    /*** load the html into the object ***/

    if($strict==1)

    {

        $dom->loadXML($html);

    }

    else

    {

        $dom->loadHTML($html);

    }

    /*** discard white space ***/

    $dom->preserveWhiteSpace = false;

    /*** the tag by its tag name ***/

    $content = $dom->getElementsByTagname($tag);

    /*** the array to return ***/

    $out = array();

    foreach ($content as $item)

    {

        /*** add node value to the out array ***/

        $out[] = $item->nodeValue;

    }

    /*** return the results ***/

    return $out;

}

}

if (!function_exists('parse_faq')) {

    function parse_faq($string_content) {

		$lines = explode(PHP_EOL, $string_content);

			$q= 1;

			foreach ($lines as $line) {

				

				$id = "quest".$q;

				/* if line contains strong */

				if (strpos($line,"<strong>") !== false) {

					$q = $q+1;

					echo '<section class="faq-section">';

					echo '<input type="checkbox" id="'.$id.'">';

					$out= str_replace('strong', 'h2', $line);

					echo str_replace('<h2>', '<h2 for="'.$id.'">', $out);

					continue;

				}

				if (strpos($line,'<p>') !== false) {

					echo $line;

					echo '</section>';

				}

			}



	}

}

function replace_strong($contents){

            $temp = $contents;

            $temp = str_replace('strong', 'h2', $temp);

            return $temp;

    }

?>