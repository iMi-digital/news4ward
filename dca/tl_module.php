<?php

/**
 * News4ward
 * a contentelement driven news/blog-system
 *
 * @author Christoph Wiechert <wio@psitrax.de>
 * @copyright 4ward.media GbR <http://www.4wardmedia.de>
 * @package news4ward
 * @filesource
 * @licence LGPL
 */


/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['news4wardList']    = '{title_legend},name,headline,type;{config_legend},news4ward_archives,news4ward_numberOfItems,news4ward_featured,news4ward_perPage,news4ward_skipFirst,news4ward_order,news4ward_timeConstraint,news4ward_ignoreFilters;{template_legend:hide},news4ward_metaFields,news4ward_template,imgSize;{redirect_legend},news4ward_overwriteArchiveJumpTo;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['news4wardReader']  = '{title_legend},name,headline,type;{config_legend},news4ward_archives,news4ward_facebookMeta;{template_legend:hide},news4ward_metaFields,news4ward_readerTemplate;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'news4ward_overwriteArchiveJumpTo';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['news4ward_overwriteArchiveJumpTo'] = 'jumpTo';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_archives'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_archives'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options_callback'        => array('tl_module_news4ward', 'getNewsArchives'),
	'eval'                    => array('multiple'=>true, 'mandatory'=>true)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_numberOfItems'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_numberOfItems'],
	'default'                 => 3,
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_featured'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_featured'],
	'default'                 => 'all_items',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('all_items', 'featured', 'unfeatured'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_perPage'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_perPage'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50')
);
		
$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_skipFirst'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_skipFirst'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_jumpToCurrent'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_jumpToCurrent'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('hide_module', 'show_current', 'all_items'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module']
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_metaFields'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_metaFields'],
	'default'                 => array('date', 'author'),
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options'                 => array('date', 'author'),
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('multiple'=>true, 'tl_class'=>'clr')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_template'],
	'default'                 => 'news4ward_list_item',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_news4ward', 'getNewsTemplates'),
	'eval'                    => array('tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_readerTemplate'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_readerTemplate'],
	'default'                 => 'mod_news4ward_reader',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_news4ward', 'getNewsReaderTemplates'),
	'eval'                    => array('tl_class'=>'w50')
);

// do we need this for an archive-module?
// FIXME
$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_format'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_format'],
	'default'                 => 'news4ward_month',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('news4ward_day', 'news4ward_month', 'news4ward_year'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
	'eval'                    => array('tl_class'=>'w50'),
	'wizard' => array
	(
		array('tl_module_news4ward', 'hideStartDay')
	)
);
$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_startDay'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_startDay'],
	'default'                 => 0,
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array(0, 1, 2, 3, 4, 5, 6),
	'reference'               => &$GLOBALS['TL_LANG']['DAYS'],
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_facebookMeta'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_facebookMeta'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'					  => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_order'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_order'],
	'default'                 => 'start DESC',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('start ASC', 'start DESC', 'title ASC', 'title DESC', 'random'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module']['news4ward_order_ref'],
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_showQuantity'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_showQuantity'],
	'exclude'                 => true,
	'inputType'               => 'checkbox'
);
$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_filterHint'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_filterHint'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>false, 'maxlength'=>'128', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_timeConstraint'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_timeConstraint'],
	'default'                 => 'all',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('all', 'cur_month', 'cur_year', 'past_7', 'past_14', 'past_30', 'past_90', 'past_180', 'past_365', 'past_two'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module']['news4ward_timeConstraint_ref'],
	'eval'                    => array('tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_overwriteArchiveJumpTo'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_overwriteArchiveJumpTo'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'					  => array('submitOnChange'=>true)
);
$GLOBALS['TL_DCA']['tl_module']['fields']['news4ward_ignoreFilters'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news4ward_ignoreFilters'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('multiple'=>false, 'tl_class'=>'w50')
);



/**
 * Class tl_module_news4ward
 */
class tl_module_news4ward extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}


	/**
	 * Get all news archives and return them as array
	 * @return array
	 */
	public function getNewsArchives()
	{
		if (!$this->User->isAdmin && !is_array($this->User->news4ward))
		{
			return array();
		}

		$arrArchives = array();
		$objArchives = $this->Database->execute("SELECT id, title FROM tl_news4ward ORDER BY title");

		while ($objArchives->next())
		{
			if ($this->User->isAdmin || $this->User->hasAccess($objArchives->id, 'news4ward'))
			{
				$arrArchives[$objArchives->id] = $objArchives->title;
			}
		}

		return $arrArchives;
	}


	/**
	 * Hide the start day drop-down if not applicable
	 * @return string
	 */
	public function hideStartDay()
	{
		return '
  <script>
  var enableStartDay = function() {
    var e1 = $("ctrl_news4ward_startDay").getParent("div");
    var e2 = $("ctrl_news4ward_order").getParent("div");
    if ($("ctrl_news4ward_format").value == "news4ward_day") {
      e1.setStyle("display", "block");
      e2.setStyle("display", "none");
	} else {
      e1.setStyle("display", "none");
      e2.setStyle("display", "block");
	}
  };
  window.addEvent("domready", function() {
    if ($("ctrl_news4ward_startDay")) {
      enableStartDay();
      $("ctrl_news4ward_format").addEvent("change", enableStartDay);
    }
  });
  </script>';
	}


	/**
	 * Return all news templates as array
	 * @param DataContainer $dc
	 * @return array
	 */
	public function getNewsTemplates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if (Input::get('act') == 'overrideAll')
		{
			$intPid = Input::get('id');
		}

		return $this->getTemplateGroup('news4ward_');
	}


	/**
	 * Return all news templates as array
	 * @param DataContainer $dc
	 * @return array
	 */
	public function getNewsReaderTemplates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if (Input::get('act') == 'overrideAll')
		{
			$intPid = Input::get('id');
		}

		return $this->getTemplateGroup('mod_news4ward_reader');
	}
}

?>
