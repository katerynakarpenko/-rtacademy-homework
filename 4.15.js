const validateNumber = function( operand ) {
  return !Number.isNaN( operand ) && operand.toString().length > 0 && operand.toString().length <= 16 && /^-?[0-9]+(\.[0-9]+)?$/.test( operand.toString() );
};

const validateAction = function( action ) {
  return action.length > 0 && action.length <= 14 && /^[a-z]+$/.test( action );
};