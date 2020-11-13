export const INCREMENT_CONTACT = 'INCREMENT_CONTACT';

export interface ContactAction {
    type: string
}

/**
 * Create the action to create a snackBar from the given props
 */
export const incrementContact = () => {
    return { type: INCREMENT_CONTACT };
};
