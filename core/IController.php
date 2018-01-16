<?php

interface IController{

	const resultType = 'JSON';

	function getRequest();
	function setData($Data);
	function returnData();


	function GET($Auth = false);
	function POST($Auth = false);
	function PUT($Auth = false);
	function DELETE($Auth = false);
}

?>