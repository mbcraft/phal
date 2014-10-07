<?php

use Phal\Text;
use Phal\Language;
use Phal\Track;

class TrackTest extends PHPUnit_Framework_TestCase {

    function testCaptions() {
        $t = Track::newCaptions(new Text("files/tracks/captions.vtt"), Language::get("it"), Language::get("it"), new Text("Italian"));

        $this->assertEquals('<track kind="captions" src="files/tracks/captions.vtt" srclang="it" lang="it" label="Italian"/>', $t);
    }

    function testChapters() {
        $t = Track::newChapters(new Text("files/tracks/chapters.vtt"), Language::get("en"), Language::get("en"), new Text("English"));

        $this->assertEquals('<track kind="chapters" src="files/tracks/chapters.vtt" srclang="en" lang="en" label="English"/>', $t);
    }

    function testSubtitles() {
        $t = Track::newSubtitles(new Text("files/tracks/subtitles.vtt"), Language::get("de"), Language::get("de"), new Text("Deutschland"));

        $this->assertEquals('<track kind="subtitles" src="files/tracks/subtitles.vtt" srclang="de" lang="de" label="Deutschland"/>', $t);
    }

    function testFailNoSrcAsText() {
        try {
            $t = Track::newSubtitles("files/tracks/subtitles.vtt", Language::get("de"), Language::get("de"), new Text("Deutschland"));

            $this->fail();
        } catch (Exception $ex) {
            
        }
    }

    function testFailNoSrcLangAsLanguage() {
        try {
            $t = Track::newSubtitles(new Text("files/tracks/subtitles.vtt"), "de", Language::get("de"), "Deutschland");

            $this->fail();
        } catch (Exception $ex) {
            
        }
    }

    function testFailNoLangAsLanguage() {
        try {
            $t = Track::newSubtitles(new Text("files/tracks/subtitles.vtt"), Language::get("de"), "de", "Deutschland");

            $this->fail();
        } catch (Exception $ex) {
            
        }
    }

    function testFailNoLabelAsText() {
        try {
            $t = Track::newSubtitles(new Text("files/tracks/subtitles.vtt"), Language::get("de"), Language::get("de"), "Deutschland");

            $this->fail();
        } catch (Exception $ex) {
            
        }
    }

}
