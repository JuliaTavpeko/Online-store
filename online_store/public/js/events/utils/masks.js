
export const phoneMask = {
    mask: '+{375}(00)000-00-00',
    lazy: false
};

export const emailMask = {
    mask: 'w@w.w',
    blocks: {
        w: { mask: /\w*/g }
    },
    lazy: false
};
