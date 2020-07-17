import { TestBed } from '@angular/core/testing';

import { VMPFormService } from './vmpform.service';

describe('VMPFormService', () => {
  let service: VMPFormService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(VMPFormService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
