<?php

class Format extends Fuel\Core\Format {
	/**
	 * To CSV conversion
	 *
	 * @param   mixed   $data
	 * @param   mixed   $delimiter
	 * @param   mixed   $enclose_numbers
	 * @param   array   $headings         Custom headings to use
	 * @return  string
	 */
	public function to_csv($data = null, $delimiter = null, $enclose_numbers = null, array $headings = array())
    {
        $csv = parent::to_csv($data, $delimiter, $enclose_numbers, $headings);
        $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
        return $csv;
    }
}
