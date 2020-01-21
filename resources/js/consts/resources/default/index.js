import * as MUTATIONS from './mutations';
import * as ACTIONS from './actions';
import { createLoadings } from './loadings';
import { createUrl } from './urls';

const LOADINGS = createLoadings('default', ACTIONS);
const URL = createUrl('version');

export {
  MUTATIONS,
  ACTIONS,
  LOADINGS,
  URL,
};
