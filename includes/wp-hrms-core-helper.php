<?php

/**
 * Help calculate years of an employee at work based on joining date
 * 
 * @param  string $date Created date/edited date of the employee
 * 
 * @return string Return date calculated in years, months and days
 */
if ( ! function_exists( 'calculate_age' ) ) {
    function calculate_age( $date ) {
        // calculate current date and original date
        $date     = new DateTime( $date );
        $now      = new DateTime();
        $interval = $now->diff( $date );

        // compose string
        $result = '';
        if( $interval->y !== 0 ) {
            $result .= ( $interval->y > 1 )?$interval->y . ' ' . __( 'years', 'wp-hrms' ) . ' ' : $interval->y . ' ' . __( 'year', 'wp-hrms' ) . ' ';
        }
 
        if( $interval->m !== 0 ) {
            $result .= ( $interval->m > 1 ) ? $interval->m . ' ' . __( 'months', 'wp-hrms' ) . ' ' : $interval->m . ' ' . __( 'month', 'wp-hrms' ) . ' ';
        }
         
        $result .= ( $interval->d > 1 ) ? $interval->d . ' ' . __( 'days', 'wp-hrms' ) . ' ' : $interval->d . ' ' . __( 'day', 'wp-hrms' ) . ' ';
        
        // return final string
        return $result;
    }
}

/**
 * Help get the departments of a specific employee.
 * 
 * @param  int $post_id The post ID to be selected.
 * 
 * @return string Return departments that were found.
 */
if ( ! function_exists( 'get_departments' ) ) {
    function get_departments( $post_id ) {
        $terms = get_the_terms( $post_id, 'department' );
        if ( $terms && ! is_wp_error( $terms ) ) {
            $departments = array();
            foreach ( $terms as $term ) {
                $departments[] = $term->name;
            }

            return join( ', ', $departments );
        }
    }
}