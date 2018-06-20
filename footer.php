<?php
/**
 * The template for displaying the footer.
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email.com>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */
?>
	
	<footer class="blueprint-footer">
        <div class="copyright"><?php echo wp_kses_post(get_theme_mod('footer_copyright', 'Copyright &copy; 2018. All rights reserved.')); ?></div>
    </footer>

	<?php wp_footer(); ?>

	</div>
</body>
</html>
