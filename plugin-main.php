<?php
/*
Plugin Name: Interactive Divisional Maps Bangladesh
Plugin URI: https://aimran.dev/
Description: Interactive divisional maps widget.
Author: M.A. IMRAN
Version: 1.0
Author URI: http://facebook.com/imran2w
*/

/*
This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or ( at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of ERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA. Online: http://www.gnu.org/licenses/gpl.txt;
*/

// Bismillah...

defined( 'ABSPATH' )or die( 'Stop! You can not do this!' );

wp_register_sidebar_widget('bd_divisional_maps', 'Interactive Divisional Maps', 'wgt_bd_divisional_maps', array('description' => __('Displays Interactive Divisional Maps of Bangladesh')));
function wgt_bd_divisional_maps( $args ) {
	extract( $args );

	$options = get_option( "bd_divisional_maps_options" );
	if ( !is_array( $options ) ) {
		$options = array(
			'title' => 'বাংলাদেশের মানচিত্র',
			'barisal' => '#',
			'chittagong' => '#',
			'dhaka' => '#',
			'khulna' => '#',
			'mymensingh' => '#',
			'rajshahi' => '#',
			'rangpur' => '#',
			'sylhet' => '#'
		);
	}

	echo $before_widget;
	echo $before_title . $options['title'] . $after_title;
	include 'map-image.php';
	echo $after_widget;
}

wp_register_widget_control( 'bd_divisional_maps', 'Interactive Divisional Maps', 'wgt_bd_divisional_maps_control' );

function wgt_bd_divisional_maps_control() {
	$options = get_option( "bd_divisional_maps_options" );
	if ( !is_array( $options ) ) {
		$options = array(
			'title' => 'বাংলাদেশের মানচিত্র',
			'barisal' => '#',
			'chittagong' => '#',
			'dhaka' => '#',
			'khulna' => '#',
			'mymensingh' => '#',
			'rajshahi' => '#',
			'rangpur' => '#',
			'sylhet' => '#'
		);
	}

	if ( isset( $_POST[ 'widget_control_submit' ] ) ) {
		$opt = array();
		$opt[ 'title' ] = esc_attr( $_POST[ 'title' ] );
		$opt[ 'barisal' ] = esc_url( $_POST[ 'barisal' ] );
		$opt[ 'chittagong' ] = esc_url( $_POST[ 'chittagong' ] );
		$opt[ 'dhaka' ] = esc_url( $_POST[ 'dhaka' ] );
		$opt[ 'khulna' ] = esc_url( $_POST[ 'khulna' ] );
		$opt[ 'mymensingh' ] = esc_url( $_POST[ 'mymensingh' ] );
		$opt[ 'rajshahi' ] = esc_url( $_POST[ 'rajshahi' ] );
		$opt[ 'rangpur' ] = esc_url( $_POST[ 'rangpur' ] );
		$opt[ 'sylhet' ] = esc_url( $_POST[ 'sylhet' ] );
		update_option( "bd_divisional_maps_options", $opt );
	}
	?>
	<table width="100%">
		<tr>
			<td><label for="title">Widget Title:</label></td>
			<td><input type="text" id="title" name="title" value="<?php echo $options['title'];?>"/></td>
		</tr>
		<tr>
			<td colspan="2"><strong><u>Division Links</u></strong></td>
		</tr>
		<tr>
			<td><label for="barisal">Barisal:</label></td>
			<td><input type="text" id="barisal" name="barisal" value="<?php echo $options['barisal'];?>"/></td>
		</tr>
		<tr>
			<td><label for="barisal">Chittagong:</label></td>
			<td><input type="text" id="chittagong" name="chittagong" value="<?php echo $options['chittagong'];?>"/></td>
		</tr>
		<tr>
			<td><label for="dhaka">Dhaka:</label></td>
			<td><input type="text" id="dhaka" name="dhaka" value="<?php echo $options['dhaka'];?>"/></td>
		</tr>
		<tr>
			<td><label for="khulna">Khulna:</label></td>
			<td><input type="text" id="khulna" name="khulna" value="<?php echo $options['khulna'];?>"/></td>
		</tr>
		<tr>
			<td><label for="mymensingh">Mymensingh:</label></td>
			<td><input type="text" id="mymensingh" name="mymensingh" value="<?php echo $options['mymensingh'];?>"/></td>
		</tr>
		<tr>
			<td><label for="rajshahi">Rajshahi:</label></td>
			<td><input type="text" id="rajshahi" name="rajshahi" value="<?php echo $options['rajshahi'];?>"/></td>
		</tr>
		<tr>
			<td><label for="rangpur">Rangpur:</label></td>
			<td><input type="text" id="rangpur" name="rangpur" value="<?php echo $options['rangpur'];?>"/></td>
		</tr>
		<tr>
			<td><label for="sylhet">Sylhet:</label></td>
			<td><input type="text" id="sylhet" name="sylhet" value="<?php echo $options['sylhet'];?>"/></td>
		</tr>
	</table>
	<input type="hidden" id="widget_control_submit" name="widget_control_submit" value="1"/>
	<?php
	}

	add_action( 'admin_init', function () {
		register_setting( 'options', 'bd_divisional_maps_options' );
	} );

	?>